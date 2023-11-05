<x-app-layout>
    <div class="max-w-screen-xl lg:ml-24 lg:mr-24 mx-auto p-6 lg:p-8 my-8">
        <p class="text-2xl font-medium text-gray-900 dark:text-white mb-4">Update Comments</p>
        <form action="/dashboard/comment/update" method="POST">
            @csrf
            <input type="hidden" name="userId" value="{{ auth()->user()->id }}">
            <input type="hidden" name="commentId" value="{{ $data->id }}">
            <input type="hidden" name="postId" value="{{ $data->post_id }}">
            <label for="chat" class="sr-only">Your message</label>
            <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700 mb-2">
                <textarea 
                    id="chat" 
                    wire:model="message" 
                    rows="1"
                    name="message" 
                    class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."
                >{{$data->message}}</textarea>
                    <button type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                        <svg class="w-5 h-5 rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z"/>
                        </svg>
                        <span class="sr-only">Send message</span>
                    </button>
            </div>
        </form>
        <a href="{{redirect()->back()->getTargetUrl()}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-1.5 text-center mr-2 mt-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-2">Back</a>
    </div>
</x-app-layout>

