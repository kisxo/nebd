<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Registration/Create');
    }

    public function schoolAdminIndex(Request $request)
    {
        $registrations = Registration::latest()->get();
        // dd($registrations);
        return Inertia::render('Admin/Registrations/Index', compact('registrations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        // ✅ Validation rules (aligned with your Vue form)
        $validated = $request->validate([
            "fullName" => "required|string|max:255",
            "fatherName" => "required|string|max:255",
            "age" => "required|integer|min:1|max:100",
            "dob" => "required|date|before:today",
            "address" => "required|string|max:500",
            "phone" => "required|digits:10",
            "email" => "required|email|max:255",
            "school" => "required|string|max:255",
            "academy" => "nullable|string|max:255",
            "teacher" => "nullable|string|max:255",
            "event" => "required|in:Dance,Fashion",  // adjust as per your form
            "category" => "required|in:Sub Junior,Junior,Senior,Duet,Group,Mr,Miss,Mrs",

            "payment_screenshot" => "required|file|mimes:pdf,jpg,jpeg,png|max:2048",
        ]);

        // ✅ Handle file upload
        $fileFields = ['payment_screenshot'];
        $uuidFilenames = [];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $ext = $file->getClientOriginalExtension();
                $uuid = Str::uuid()->toString();
                $filename = $uuid . '.' . $ext;

                // Store file in storage/app/public/online-registration/uploads/
                $file->storeAs('online-registration/uploads', $filename, 'public');

                // Save only the filename in DB
                $uuidFilenames[$field] = $filename;
            }
        }

        // ✅ Merge file names into validated data
        $validated = array_merge($validated, $uuidFilenames);

        // ✅ Save registration
        $registration = Registration::create($validated);

        // ✅ Generate PDF (your method)
        // $this->generatePdf($registration);

        // ✅ Send email (your method)
        // $this->sendRegistrationMail($registration);

        // ✅ Redirect back with flash message
        return Inertia::render('Registration/Success', [
            'status'  => 'success',
            'message' => 'Registration successful!',
            'id'      => $registration->id,
        ]);
    }

    /**
     * Display the specified registration details.
     *
     * @param  string  $id  The ID of the registration to retrieve.
     * @return \Inertia\Response  Inertia response that renders the RegistrationShow Vue component.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the registration is not found.
     */
    public function show(string $id)
    {
        $registration = Registration::findOrFail($id);

        return Inertia::render('Admin/Registrations/Show', [
            'registration' => $registration,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
