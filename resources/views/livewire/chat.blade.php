{{-- <x-navbar> --}}

<div class="flex h-screen bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- قائمة المستخدمين -->
    <div class="w-1/4 bg-white border-r border-gray-200 shadow-xl flex flex-col rounded-tr-2xl rounded-br-2xl overflow-hidden">
        <div class="p-4 border-b bg-gradient-to-r from-blue-500 to-indigo-500 text-white">
            <h2 class="text-lg font-semibold">قائمة المستخدمين</h2>
        </div>

        <ul class="flex-1 overflow-y-auto p-3 space-y-2">
            @foreach ($users as $user)
                <li 
                    wire:click="selectUser({{ $user->id }})"
                    class="p-3 rounded-xl cursor-pointer transition transform hover:scale-[1.02] hover:shadow-md border 
                    {{ $selectedUser && $selectedUser->id === $user->id 
                        ? 'bg-blue-100 border-blue-400 shadow-sm' 
                        : 'bg-gray-50 border-gray-200 hover:bg-blue-50' }}">
                    <div class="flex items-center space-x-3 rtl:space-x-reverse">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-400 to-indigo-500 flex items-center justify-center text-white font-bold">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">{{ $user->name }}</p>
                            <p class="text-sm text-gray-500">{{ $user->email }}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- منطقة الشات -->
    <div class="flex-1 flex flex-col bg-gray-50 rounded-tl-2xl rounded-bl-2xl overflow-hidden shadow-inner">
        @if ($selectedUser)
            <!-- رأس المحادثة -->
            <div class="flex items-center justify-between px-6 py-4 bg-white border-b shadow-sm">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">{{ $selectedUser->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $selectedUser->email }}</p>
                </div>
                <button 
                    wire:click="$refresh" 
                    class="text-sm text-blue-600 hover:underline hover:text-blue-800 transition">
                    🔄 تحديث
                </button>
            </div>

            <!-- الرسائل -->
            <div class="flex-1 overflow-y-auto p-6 space-y-4 bg-gray-100">
                <!-- رسالة مرسلة -->
                    @foreach($messages as $message)

                <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }} ">
                    <div class="max-w-xs bg-blue-600 text-white rounded-2xl px-4 py-2 shadow-md">
                                             {{$message->message }}

                    </div>
                </div>
                    @endforeach

                <!-- رسالة مستلمة -->
                <div class="flex justify-start">
                    <div class="max-w-xs bg-white text-gray-800 rounded-2xl px-4 py-2 shadow-md border">
                    </div>
                </div>
            </div>

            <!-- إدخال الرسالة -->
            {{-- <div class="border-t bg-white p-4 flex items-center shadow-md">
                <input
                    type="text"
                    placeholder="اكتب رسالتك هنا..."
                    class="flex-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700"
                /> --}}
               <form wire:submit="submit" class="p-4 border-t bg-white flex items-center gap-2">
               <input wire:model="newMessage" type="text" placeholder="اكتب رسالتك هنا..."
    class="flex-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
  <button type="submi" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full transition">
                    إرسال
               </form>
                
            {{-- </div> --}}
        @else
            <!-- حالة عدم اختيار مستخدم -->
            <div class="flex-1 flex flex-col items-center justify-center text-gray-500 space-y-2">
                <span class="text-5xl">💬</span>
                <p class="text-lg">اختر مستخدمًا لبدء المحادثة</p>
            </div>
        @endif
    </div>
</div>


{{-- </x-navbar> --}}