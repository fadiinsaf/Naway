@extends('layouts.admin')

@section('content')
    <div class="space-y-6 pb-8" x-data="{ loaded: false }" x-init="setTimeout(() => loaded = true, 100)">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-2">
            <div>
                <h2 class="text-2xl font-bold text-accent dark:text-soft">Platform Analytics</h2>
                <p class="text-sm opacity-70 mt-1">Overview of your community growth and content library.</p>
            </div>
            <div class="flex gap-2">
                <select
                    class="bg-white dark:bg-darkbg border border-primary/20 text-accent dark:text-soft text-sm rounded-lg focus:ring-primary focus:border-primary block p-2.5 transition">
                    <option>Last 7 Days</option>
                    <option>Last 30 Days</option>
                    <option>This Year</option>
                </select>
                <button
                    class="bg-primary/10 text-primary border border-primary/20 px-4 py-2 rounded-lg text-sm font-medium hover:bg-primary/20 transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Export
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div
                class="bg-white dark:bg-black/20 border border-primary/10 rounded-2xl p-5 shadow-sm relative overflow-hidden group">
                <div
                    class="absolute -right-6 -top-6 w-24 h-24 bg-primary/5 rounded-full group-hover:scale-150 transition-transform duration-500">
                </div>
                <div class="flex justify-between items-start relative z-10">
                    <div>
                        <div class="text-xs font-bold uppercase tracking-wider opacity-60 mb-1 text-primary">Total Users
                        </div>
                        <div class="text-3xl font-black text-accent dark:text-soft">12,450</div>
                    </div>
                    <div class="p-2 bg-green-500/10 text-green-500 rounded-lg text-xs font-bold flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                        </svg>
                        12%
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-black/20 border border-primary/10 rounded-2xl p-5 shadow-sm relative overflow-hidden group">
                <div
                    class="absolute -right-6 -top-6 w-24 h-24 bg-primary/5 rounded-full group-hover:scale-150 transition-transform duration-500">
                </div>
                <div class="flex justify-between items-start relative z-10">
                    <div>
                        <div class="text-xs font-bold uppercase tracking-wider opacity-60 mb-1 text-primary">Library Items
                        </div>
                        <div class="text-3xl font-black text-accent dark:text-soft">842</div>
                    </div>
                    <div class="p-2 bg-green-500/10 text-green-500 rounded-lg text-xs font-bold flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                        </svg>
                        4%
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-black/20 border border-primary/10 rounded-2xl p-5 shadow-sm relative overflow-hidden group">
                <div
                    class="absolute -right-6 -top-6 w-24 h-24 bg-primary/5 rounded-full group-hover:scale-150 transition-transform duration-500">
                </div>
                <div class="flex justify-between items-start relative z-10">
                    <div>
                        <div class="text-xs font-bold uppercase tracking-wider opacity-60 mb-1 text-primary">Audio Plays
                        </div>
                        <div class="text-3xl font-black text-accent dark:text-soft">45.2k</div>
                    </div>
                    <div class="p-2 bg-green-500/10 text-green-500 rounded-lg text-xs font-bold flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                        </svg>
                        28%
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-black/20 border border-primary/10 rounded-2xl p-5 shadow-sm relative overflow-hidden group">
                <div
                    class="absolute -right-6 -top-6 w-24 h-24 bg-primary/5 rounded-full group-hover:scale-150 transition-transform duration-500">
                </div>
                <div class="flex justify-between items-start relative z-10">
                    <div>
                        <div class="text-xs font-bold uppercase tracking-wider opacity-60 mb-1 text-primary">Pending Mods
                        </div>
                        <div class="text-3xl font-black text-accent dark:text-soft">14</div>
                    </div>
                    <div class="p-2 bg-red-500/10 text-red-500 rounded-lg text-xs font-bold flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                        Action
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="bg-white dark:bg-black/20 border border-primary/10 rounded-2xl p-6 shadow-sm lg:col-span-2">
                <h3 class="text-base font-bold text-accent dark:text-soft mb-6">User Growth (Last 7 Days)</h3>

                <div class="h-48 flex items-end justify-between gap-2 mt-4 relative">
                    <div class="absolute inset-0 flex flex-col justify-between pointer-events-none opacity-10">
                        <div class="w-full h-px bg-accent"></div>
                        <div class="w-full h-px bg-accent"></div>
                        <div class="w-full h-px bg-accent"></div>
                        <div class="w-full h-px bg-accent"></div>
                    </div>

                    <div class="w-full flex justify-around items-end h-full z-10 px-2 pb-1">
                        <div class="w-1/12 bg-primary/40 hover:bg-primary transition-colors rounded-t-sm"
                            :style="loaded ? 'height: 40%; transition: height 1s ease;' : 'height: 0%'" title="Mon: 120">
                        </div>
                        <div class="w-1/12 bg-primary/40 hover:bg-primary transition-colors rounded-t-sm"
                            :style="loaded ? 'height: 55%; transition: height 1s ease 0.1s;' : 'height: 0%'"
                            title="Tue: 165"></div>
                        <div class="w-1/12 bg-primary/40 hover:bg-primary transition-colors rounded-t-sm"
                            :style="loaded ? 'height: 45%; transition: height 1s ease 0.2s;' : 'height: 0%'"
                            title="Wed: 135"></div>
                        <div class="w-1/12 bg-primary/40 hover:bg-primary transition-colors rounded-t-sm"
                            :style="loaded ? 'height: 70%; transition: height 1s ease 0.3s;' : 'height: 0%'"
                            title="Thu: 210"></div>
                        <div class="w-1/12 bg-primary/40 hover:bg-primary transition-colors rounded-t-sm"
                            :style="loaded ? 'height: 85%; transition: height 1s ease 0.4s;' : 'height: 0%'"
                            title="Fri: 255"></div>
                        <div class="w-1/12 bg-primary/80 hover:bg-primary transition-colors rounded-t-sm relative"
                            :style="loaded ? 'height: 100%; transition: height 1s ease 0.5s;' : 'height: 0%'"
                            title="Sat: 300">
                            <span
                                class="absolute -top-6 left-1/2 -translate-x-1/2 text-xs font-bold text-primary">Peak</span>
                        </div>
                        <div class="w-1/12 bg-primary/40 hover:bg-primary transition-colors rounded-t-sm"
                            :style="loaded ? 'height: 60%; transition: height 1s ease 0.6s;' : 'height: 0%'"
                            title="Sun: 180"></div>
                    </div>
                </div>
                <div class="flex justify-around text-xs font-medium opacity-60 mt-2">
                    <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
                </div>
            </div>

            <div class="bg-white dark:bg-black/20 border border-primary/10 rounded-2xl p-6 shadow-sm">
                <h3 class="text-base font-bold text-accent dark:text-soft mb-6">Content Breakdown</h3>

                <div class="space-y-6 mt-2">
                    <div>
                        <div class="flex justify-between text-sm font-medium mb-1.5">
                            <span class="text-accent dark:text-soft">Artists</span>
                            <span class="opacity-70">142</span>
                        </div>
                        <div class="w-full bg-accent/10 rounded-full h-2.5 overflow-hidden">
                            <div class="bg-primary h-2.5 rounded-full"
                                :style="loaded ? 'width: 45%; transition: width 1.5s ease;' : 'width: 0%'"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between text-sm font-medium mb-1.5">
                            <span class="text-accent dark:text-soft">Instruments</span>
                            <span class="opacity-70">56</span>
                        </div>
                        <div class="w-full bg-accent/10 rounded-full h-2.5 overflow-hidden">
                            <div class="bg-primary/80 h-2.5 rounded-full"
                                :style="loaded ? 'width: 20%; transition: width 1.5s ease 0.2s;' : 'width: 0%'"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between text-sm font-medium mb-1.5">
                            <span class="text-accent dark:text-soft">Maqams</span>
                            <span class="opacity-70">48</span>
                        </div>
                        <div class="w-full bg-accent/10 rounded-full h-2.5 overflow-hidden">
                            <div class="bg-primary/60 h-2.5 rounded-full"
                                :style="loaded ? 'width: 15%; transition: width 1.5s ease 0.4s;' : 'width: 0%'"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between text-sm font-medium mb-1.5">
                            <span class="text-accent dark:text-soft">Rhythms (Iqa'at)</span>
                            <span class="opacity-70">32</span>
                        </div>
                        <div class="w-full bg-accent/10 rounded-full h-2.5 overflow-hidden">
                            <div class="bg-primary/40 h-2.5 rounded-full"
                                :style="loaded ? 'width: 10%; transition: width 1.5s ease 0.6s;' : 'width: 0%'"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-black/20 border border-primary/10 rounded-2xl shadow-sm overflow-hidden">
            <div class="p-5 border-b border-primary/10 flex justify-between items-center">
                <h3 class="text-base font-bold text-accent dark:text-soft">Recent Platform Activity</h3>
                <a href="#" class="text-sm font-medium text-primary hover:underline">View All Logs</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <tbody class="divide-y divide-primary/5 text-sm">
                        <tr class="hover:bg-primary/5 transition">
                            <td class="p-4 w-12">
                                <div
                                    class="w-8 h-8 rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                                        </path>
                                    </svg>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="font-semibold text-accent dark:text-soft">New User Sign up</span>
                                <span class="opacity-70 block text-xs mt-0.5">user.khalid@example.com joined the
                                    platform.</span>
                            </td>
                            <td class="p-4 text-right opacity-60 text-xs">2 mins ago</td>
                        </tr>
                        <tr class="hover:bg-primary/5 transition">
                            <td class="p-4 w-12">
                                <div
                                    class="w-8 h-8 rounded-full bg-green-500/10 text-green-500 flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 19V6l12-3v13M9 19c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm12-3c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zM9 10l12-3">
                                        </path>
                                    </svg>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="font-semibold text-accent dark:text-soft">Content Added</span>
                                <span class="opacity-70 block text-xs mt-0.5">Admin Fadi added a new Instrument: <span
                                        class="font-medium text-primary">Qanun</span>.</span>
                            </td>
                            <td class="p-4 text-right opacity-60 text-xs">1 hour ago</td>
                        </tr>
                        <tr class="hover:bg-primary/5 transition">
                            <td class="p-4 w-12">
                                <div
                                    class="w-8 h-8 rounded-full bg-red-500/10 text-red-500 flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                        </path>
                                    </svg>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="font-semibold text-accent dark:text-soft">Comment Flagged</span>
                                <span class="opacity-70 block text-xs mt-0.5">Automated system flagged a comment for
                                    review.</span>
                            </td>
                            <td class="p-4 text-right opacity-60 text-xs">3 hours ago</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
