<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create a new post
        </h2>
    </x-slot>

    <x-card>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-400">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form enctype="multipart/form-data" action="{{ route('post.store') }}" method="post">
            @csrf
            <div x-data="imageViewer()">
                <label for="body" class="block text-sm font-medium text-gray-700">
                    Text
                </label>
                <div class="mt-1">
                <textarea id="body" name="body" rows="5"
                          class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                          placeholder="Write something cool..."></textarea>
                </div>
                <div class="mt-4 text-sm text-gray-500 flex justify-between">
                    <div><label id="file-upload-label" for="file-upload" class="relative cursor-pointer">
                            <span>Upload an image</span>
                            <input id="file-upload" name="upload" type="file" class="sr-only" @change="fileChosen">
                        </label>
                    </div>
                    <div>
                        <template x-if="imageUrl">
                            <a href="#" class="text-red-400" @click="removeImage">Remove image</a>
                        </template>
                    </div>
                </div>

                <template x-if="imageUrl">
                    <div class="mt-4">
                        <img :src="imageUrl"
                             class="object-cover rounded border border-gray-200"
                        >
                    </div>
                </template>

            </div>
            <x-card-footer>
                <div class="text-right">
                    <x-button>Post</x-button>
                </div>
            </x-card-footer>
        </form>
    </x-card>

    <script>
        function imageViewer() {
            return {
                imageUrl: '',

                fileChosen(event) {
                    this.fileToDataUrl(event, src => this.imageUrl = src)
                },

                fileToDataUrl(event, callback) {
                    if (!event.target.files.length) return

                    let file = event.target.files[0],
                        reader = new FileReader()

                    reader.readAsDataURL(file)
                    reader.onload = e => callback(e.target.result)
                },

                removeImage() {
                    this.imageUrl = ''
                }
            }
        }
    </script>

</x-app-layout>
