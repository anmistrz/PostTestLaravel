<div>
    @if(!empty($posts))
        @foreach($posts as $row)
            <div class="max-w-sm w-full lg:max-w-full lg:flex my-4">
                <div class=" dark:border-gray-700 dark:bg-gray-800 border-gray-200 bg-white dark:bg-gray-800 lg:border-l-0 lg:border-gray-200  flex flex-col justify-between leading-normal rounded-lg shadow-lg p-6 w-full">
                <div class="mb-8">
                    <div class="flex justify-between">
                        <p class="text-sm text-gray-600 flex items-center">
                        <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path
                            fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-9a1 1 0 11-2 0 1 1 0 012 0z"
                            clip-rule="evenodd"
                            ></path>
                        </svg>
                        Public
                        </p>
                        @if(!empty($row->user->name))
                            @if(auth()->user()->id == $row->user_id)
                                <button id="dropdownPostButton" data-dropdown-toggle="dropdownPost"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-40 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                    </svg>
                                    <span class="sr-only">Comment settings</span>
                                </button>
                            @endif
                        @endif

                    </div>
                    <div class="dark:text-gray-200 text-gray-900 font-bold text-xl mb-2">{{ $row->title }}</div>
                    <p class="dark:text-gray-400 text-gray-700 text-base mb-2 text-overflow-ellipsis overflow-hidden">{{ substr($row->description, 0, 200) }}...</p>
                    <input type="hidden" name="remember" model:wire="post_id">
                    <a 
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-1.5 text-center mr-2 mt-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        href={{"/dashboard/detail/".$row->id}}
                    >
                        Read More
                    </a>
                </div>
                <div class="items-center">
                    <div class="text-sm mb-2">
                        <p class="dark:text-gray-200 text-gray-900 leading-none">
                            <a href={{"/dashboard/detail/".$row->id}}>
                                {{ $comment->filter(function($value, $key) use ($row) { return $value->post_id == $row->id; })->count() }} Comments
                            </a>
                        </p>
                    </div>
                    @auth
                        <livewire:comments.create-comments :idPost="$row->id" :idUser="auth()->user()->id" />
                    @endauth
                </div>
                </div>
            </div>
        @endforeach
    @else
            <div class="max-w-sm w-full lg:max-w-full lg:flex my-4">
                <p class="dark:text-gray-200 text-gray-900 leading-none">No posts yet</p>
            </div>
    @endif


            <!-- Dropdown menu -->
            <div id="dropdownPost"
                class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownMenuIconHorizontalButton">
                    <li>
                        <a href="{{ route('dashboard.post.edit', $row->id) }}"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.post.delete', $row->id) }}"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                    </li>
                </ul>
            </div>
</div> 
