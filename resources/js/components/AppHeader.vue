<script setup lang="ts">
import logoImg from '../../assets/logo.jpg';
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { Button } from '@/components/ui/button';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import {
    NavigationMenu,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
    navigationMenuTriggerStyle,
} from '@/components/ui/navigation-menu';
import {
    Sheet,
    SheetContent,
    SheetHeader,
    SheetTitle,
    SheetTrigger,
} from '@/components/ui/sheet';
import {
    Tooltip,
    TooltipContent,
    TooltipProvider,
    TooltipTrigger,
} from '@/components/ui/tooltip';
import UserMenuContent from '@/components/UserMenuContent.vue';
import { getInitials } from '@/composables/useInitials';
import { toUrl, urlIsActive } from '@/lib/utils';
import { dashboard } from '@/routes';
import type { BreadcrumbItem, NavItem } from '@/types';
import { InertiaLinkProps, Link, usePage } from '@inertiajs/vue3';
import { BookOpen, Folder, LayoutGrid, Menu, Search, Home, User2Icon, MenuIcon, Edit } from 'lucide-vue-next';
import { computed } from 'vue';
import AppLogo from './AppLogo.vue';
import InfoBar from './InfoBar.vue';

interface Props {
    breadcrumbs?: BreadcrumbItem[];
}

const props = withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});

const page = usePage();
const auth = computed(() => page.props.auth);

const isCurrentRoute = computed(
    () => (url: NonNullable<InertiaLinkProps['href']>) =>
        urlIsActive(url, page.url),
);

const activeItemStyles = computed(
    () => (url: NonNullable<InertiaLinkProps['href']>) =>
        isCurrentRoute.value(toUrl(url))
            ? 'text-neutral-900 dark:bg-neutral-800 dark:text-neutral-100'
            : '',
);


const NavItems: NavItem[] = [
    {
        title: 'Home',
        href: '/',
        icon: Home,
    },
    {
        title: 'Judges',
        href: '/judges',
        icon: User2Icon,
    },
];
</script>
<template>
    <InfoBar/>
    <div class="flex items-center px-4 md:px-10 py-3 shadow-sm">

        <Link :href="'/'" class="flex items-center gap-x-3 w-full lg:w-fit">
            <AppLogo />
        </Link>

        <!-- Mobile Menu -->
        <div class="ml-auto lg:hidden">
            <Sheet>
                <SheetTrigger :as-child="true">
                    <MenuIcon class="size-10 m-auto stroke-gray-600 hover:stroke-gray-900"/>
                </SheetTrigger>
                <SheetContent side="right" class="w-[300px] p-10 pt-20" >
                    <Accordion type="single" class="w-full" collapsible>

                        <NavigationMenuLink :href="'/'" class="block font-['Poppins'] font-semibold px-2 py-4 hover:underline"><span class="">Home</span></NavigationMenuLink>
                        <!-- Divider line between sections-->
                        <hr class="border-t-1 border-gray-200 dark:border-gray-700" />

                        <NavigationMenuLink :href="'/judges'" class="block font-['Poppins'] font-semibold px-2 py-4 hover:underline"><span class=""></span>Judges</NavigationMenuLink>

                        <hr class="border-t-1 border-gray-200 dark:border-gray-700" />

                        <NavigationMenuLink :href="'/about'" class="block font-['Poppins'] font-semibold px-2 py-4 hover:underline"><span class=""></span>About Us</NavigationMenuLink>

                        <hr class="border-t-1 border-gray-200 dark:border-gray-700" />
                        <NavigationMenuLink :href="'/online-registration/create'" class="block font-['Poppins'] font-semibold px-2 py-4 hover:underline"><span class="flex items-center gap-4">Register Now <Edit class="size-6"/></span></NavigationMenuLink>
                    </Accordion>
                </SheetContent>
            </Sheet>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex items-center ml-auto">

            <div className="hidden md:flex items-center space-x-6 font-light text-sm">

            <div>
                <Link href="/" class="nav-link">Home</Link>
            </div>
            <div>
                <Link href="/judges" class="nav-link">Judges</Link>
            </div>
            <div>
                <Link href="/about-us" class="nav-link">About Us</Link>
            </div>

            <div>
                <Link href="/online-registration/create" class="nav-link border px-8 py-2 rounded-4xl ms-6">Register Now</Link>
            </div>
          </div>


        </div>
    </div>


        <!-- <div v-if="props.breadcrumbs.length > 1" class="flex w-full border-b border-sidebar-border/70">
            <div class="mx-auto flex h-12 w-full items-center justify-start px-4 text-neutral-500 md:max-w-7xl">
                <Breadcrumbs :breadcrumbs="breadcrumbs" />
            </div>
        </div> -->
    
</template>