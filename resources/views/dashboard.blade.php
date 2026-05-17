<x-app-layout>

    <div class="bg-gray-100 min-h-screen pt-24">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <a href="{{ route('short_urls.list') }}"
                   class="group bg-white hover:bg-blue-50 border border-gray-200 rounded-xl p-6 shadow-sm transition-all duration-200 hover:shadow-md hover:border-blue-300">

                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">
                                Show URLs
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                View all short URLs
                            </p>
                        </div>

                        <div class="text-3xl group-hover:scale-110 transition-transform">
                            🔗
                        </div>
                    </div>

                </a>

                <a href="{{ route('short_urls.create') }}"
                   class="group bg-white hover:bg-green-50 border border-gray-200 rounded-xl p-6 shadow-sm transition-all duration-200 hover:shadow-md hover:border-green-300">

                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-green-600 transition-colors">
                                Create URL
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Generate a short URL
                            </p>
                        </div>

                        <div class="text-3xl group-hover:scale-110 transition-transform">
                            ✨
                        </div>
                    </div>

                </a>

                <a href="{{ route('invite.create') }}"
                   class="group bg-white hover:bg-purple-50 border border-gray-200 rounded-xl p-6 shadow-sm transition-all duration-200 hover:shadow-md hover:border-purple-300">

                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 group-hover:text-purple-600 transition-colors">
                                Invite Users
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Invite admins and members
                            </p>
                        </div>

                        <div class="text-3xl group-hover:scale-110 transition-transform">
                            👥
                        </div>
                    </div>

                </a>

            </div>

        </div>
    </div>

</x-app-layout>