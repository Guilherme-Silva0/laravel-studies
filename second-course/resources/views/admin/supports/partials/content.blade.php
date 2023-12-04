<div class="flex flex-col mt-6 my-4">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden border border-gray-700 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-800">
                        <tr>
                            <th scope="col"
                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                Assunto
                            </th>

                            <th scope="col"
                                class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-400">
                                Status
                            </th>

                            <th scope="col"
                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-400">
                                Comentário
                            </th>

                            <th scope="col"
                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-400">
                                Interações</th>

                            <th scope="col" class="relative py-3.5 px-4">
                                <span class="sr-only">Ver</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700 bg-gray-900">
                        @foreach ($supports->items() as $support)
                            <tr>
                                <td class="px-4 py-2 text-sm font-medium whitespace-nowrap text-white">
                                    {{ $support->subject }}
                                </td>
                                <td class="px-12 py-2 text-sm font-medium whitespace-nowrap">
                                    <div
                                        class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-gray-800">
                                        {{ getStatusSupport($support->status) }}
                                    </div>
                                </td>
                                <td class="px-4 py-2 text-sm whitespace-nowrap text-gray-400">
                                    {{ $support->body }}
                                </td>
                                <td class="px-4 py-2 text-sm whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img class="object-cover w-6 h-6 -mx-1 border-2 rounded-full border-gray-700 shrink-0"
                                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&q=80"
                                            alt="">
                                        <img class="object-cover w-6 h-6 -mx-1 border-2 rounded-full border-gray-700 shrink-0"
                                            src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&q=80"
                                            alt="">
                                        <img class="object-cover w-6 h-6 -mx-1 border-2 rounded-full border-gray-700 shrink-0"
                                            src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1256&q=80"
                                            alt="">
                                        <img class="object-cover w-6 h-6 -mx-1 border-2 rounded-full border-gray-700 shrink-0"
                                            src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=256&q=80"
                                            alt="">
                                        <p
                                            class="flex items-center justify-center w-6 h-6 -mx-1 text-xs text-blue-600 bg-blue-100 border-2 border-white rounded-full">
                                            +4</p>
                                    </div>
                                </td>

                                <td class="px-4 py-2 text-sm whitespace-nowrap flex items-center justify-center">
                                    <a href="{{ route('supports.edit', $support->id) }}"
                                        class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg">
                                        Editar
                                    </a>
                                    <a href="{{ route('supports.show', $support->id) }}"
                                        class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                        </svg>

                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>