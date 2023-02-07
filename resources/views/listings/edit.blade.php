<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit the Post </h2>
            <p class="mb-4">Edit the pet to find owner</p>
        </header>

        <form action="/listings/{{ $listing->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Pet Name
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company" value="{{ $listing->company }}"/>
                @error('company')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Pet Title
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" placeholder="Example: Yellow Cat" value="{{ $listing->title }}"/>
                @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Pet Location
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" placeholder="Example: Remote, Boston MA, etc" value="{{ $listing->location }}"/>
                @error('tags')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{ $listing->email }}"/>
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" placeholder="Example: cat, yellow, funny, kind, angry" value="{{ $listing->tags }}"/>
                @error('tags')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Pet picture
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo"/>

                <img class="w-48 mr-6 mb-6" src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/pet-default.jpeg') }}" alt=""/>


                @error('logo')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Pet Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Include age, weight, color, eyecolor, trait etc.">{{ $listing->description }}</textarea>
                @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Edit Post
                </button>

                <a href="/listings/{{ $listing->id }}" class="text-black ml-4"> Back</a>
            </div>
        </form>
    </div>
</x-layout>