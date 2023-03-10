<x-layout>
<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Create a Post </h2>
        <p class="mb-4">Post a pet to find owner</p>
    </header>

    <form action="/listings" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="animalName" class="inline-block text-lg mb-2">Pet Name
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="animalName" value="{{ old('animalName') }}"/>
            @error('animalName')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="animal" class="inline-block text-lg mb-2">Pet Type
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="animal" placeholder="Example: Yellow Cat" value="{{ old('animal') }}"/>
            @error('animal')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="location" class="inline-block text-lg mb-2">Pet Location
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" placeholder="Example: Remote, Boston MA, etc" value="{{ old('location') }}"/>
            @error('tags')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2">Contact Email
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{ old('email') }}"/>
            @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="tags" class="inline-block text-lg mb-2">
                Tags (Comma Separated)
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" placeholder="Example: cat, yellow, funny, kind, angry" value="{{ old('tags') }}"/>
            @error('tags')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="logo" class="inline-block text-lg mb-2">
                Pet picture
            </label>
            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo"/>
            @error('logo')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">
                Pet Description
            </label>
            <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="Include age, weight, color, eyecolor, trait etc." {{ old('description') }}></textarea>
            @error('description')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Publish Post
            </button>

            <a href="/" class="text-black ml-4"> Back</a>
        </div>
    </form>
</div>
</x-layout>