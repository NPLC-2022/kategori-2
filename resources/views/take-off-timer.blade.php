<x-guest-layout>
    <main class="h-screen w-screen relative bg-[#292561] flex items-center justify-center">
        <div class="relative">
            <div class="hidden absolute top-0 inset-x-0 h-1/2  lg:block" aria-hidden="true"></div>
            <div class="max-w-7xl mx-auto bg-indigo-600 lg:bg-transparent lg:px-8">
                <div class="lg:grid lg:grid-cols-12">
                    <div class="relative z-10 lg:col-start-1 lg:row-start-1 lg:col-span-4 lg:py-16 lg:bg-transparent">
                        <div class="absolute inset-x-0 h-1/2 bg-gray-50 lg:hidden" aria-hidden="true"></div>
                        <div class="max-w-md mx-auto px-4 sm:max-w-3xl sm:px-6 lg:max-w-none lg:p-0">
                            <div class="aspect-w-10 aspect-h-6 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1">
                                <img class="object-cover object-center rounded-3xl shadow-2xl"
                                     src="https://images.unsplash.com/photo-1507207611509-ec012433ff52?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=934&q=80"
                                     alt="">
                            </div>
                        </div>
                    </div>

                    <div
                        class="relative bg-[#352D7A] lg:col-start-3 lg:row-start-1 lg:col-span-10 lg:rounded-3xl lg:grid lg:grid-cols-10 lg:items-center">
                        <div class="hidden absolute inset-0 overflow-hidden rounded-3xl lg:block" aria-hidden="true">
                            <svg
                                class="absolute bottom-full left-full transform translate-y-1/3 -translate-x-2/3 xl:bottom-auto xl:top-0 xl:translate-y-0"
                                width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                                <defs>
                                    <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20"
                                             height="20" patternUnits="userSpaceOnUse">
                                        <rect x="0" y="0" width="4" height="4" class="text-indigo-500"
                                              fill="currentColor"/>
                                    </pattern>
                                </defs>
                                <rect width="404" height="384" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)"/>
                            </svg>
                            <svg
                                class="absolute top-full transform -translate-y-1/3 -translate-x-1/3 xl:-translate-y-1/2"
                                width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                                <defs>
                                    <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20"
                                             height="20" patternUnits="userSpaceOnUse">
                                        <rect x="0" y="0" width="4" height="4" class="text-indigo-500"
                                              fill="currentColor"/>
                                    </pattern>
                                </defs>
                                <rect width="404" height="384" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)"/>
                            </svg>
                        </div>
                        <div
                            class="relative max-w-md mx-auto py-12 px-4 space-y-6 sm:max-w-3xl sm:py-16 sm:px-6 lg:max-w-none lg:p-0 lg:col-start-4 lg:col-span-6">
                            <h2 class="text-3xl font-extrabold text-white" id="join-heading">🚀 Get ready to launch!</h2>
                            <p class="text-lg text-white">We're currently preparing your crew to launch, and complete
                                the mission. We'll let you know once we're ready.</p>

                            <div class="w-1/2 border border-gray-100 text-gray-50 p-4 rounded border-dashed">
                                <p class="uppercase text-lg font-semibold">Take off in:</p>
                                <x-countdown :expires="now()->addHours(10)" class="text-2xl font-mono"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
