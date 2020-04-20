<!-- NavBar For Authenticated Users -->
<nav-bar
        :user="user"
        :teams="teams"
        :current-team="currentTeam"
        :has-unread-notifications="hasUnreadNotifications"
        :has-unread-announcements="hasUnreadAnnouncements"
        :nav-open="navOpen"
        :dropdown-open="dropdownOpen"
        inline-template>
     <div class="bg-white mb-8">
        <nav class="container mx-auto flex items-center justify-between flex-wrap py-3 px-4">
            @include('nav.brand')
            <div class="block lg:hidden">
                <button @click="toggleNav" class="flex items-center px-3 py-2 border rounded text-grey-dark border-grey-dark">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
            </div>
            <div :class="navOpen ? 'block': 'hidden'" class="w-full text-right flex-grow lg:flex lg:items-center lg:w-auto relative">
                @include('nav.user-left')
                <a @click="showNotifications" class="has-activity-indicator">
                    <div class="navbar-icon py-6 lg:py-2">
                        <i class="activity-indicator" v-if="hasUnreadNotifications || hasUnreadAnnouncements"></i>
                        <i class="icon fa fa-bell"></i>
                    </div>
                </a>
                @include('nav.dropdown-toggle')
            </div>
        </nav>
    </div>
 </nav-bar>
