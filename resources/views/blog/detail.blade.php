<x-app-layout>

    <div class="max-w-screen-xl lg:ml-24 lg:mr-24 mx-auto p-6 lg:p-8">
            <div class="text-2xl font-medium text-gray-900 dark:text-white mb-4">
                {{ $data->title }}
                <div class="flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="18" height="18" viewBox="0 0 24 24">
                        <path d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.430123 16.430123 20 12 20 C 7.5698774 20 4 16.430123 4 12 C 4 7.5698774 7.5698774 4 12 4 z M 11 6 L 11 12.414062 L 15.292969 16.707031 L 16.707031 15.292969 L 13 11.585938 L 13 6 L 11 6 z"></path>
                    </svg>
                    <p class="text-sm font-medium text-gray-900 dark:text-white mb-4 d-flex">
                        {{ $data->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
            <div class="mt-2 text-gray-600">
                {{ $data->description }}
            </div>
            <div class="mt-2 text-gray-600">
                <livewire:comments.create-comments :idPost="$data->id" :idUser="auth()->user()->id" />
                <livewire:comments.index-comments :idPost="$data->id"/>
            </div>

    </div>
</x-app-layout>