@csrf
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
    <div class="mb-5">
        <label for="contact_person" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Person</label>
        <input value="{{ old('contact_person', $information->contact_person ?? null) }}" type="text" id="contact_person" name="contact_person" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>
    <div class="mb-5">
        <label for="contact_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact No</label>
        <input value="{{ old('contact_no', $information->contact_no ?? null) }}" type="text" oninput="restrictToNumbers(this)" id="contact_no" name="contact_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>
    <div class="mb-5">
        <label for="email_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
        <input value="{{ old('email_address', $information->email_address ?? null) }}" type="email" id="email_address" name="email_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>
</div>

<div class="mb-5">
    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
    <input value="{{ old('address', $information->address ?? null) }}" type="text" id="address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
</div>

<div class="mb-5">
    <label for="map_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Google Map URL</label>
    <input value="{{ old('map_url', $information->map_url ?? null) }}" type="text" id="map_url" name="map_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
</div>

<div class="mb-5">
    <label for="facebook_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook URL</label>
    <input value="{{ old('facebook_url', $information->facebook_url ?? null) }}" type="text" id="facebook_url" name="facebook_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>

<div class="mb-5">
    <label for="instagram_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram URL</label>
    <input value="{{ old('instagram_url', $information->instagram_url ?? null) }}" type="text" id="instagram_url" name="instagram_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>

<div class="mb-5">
    <label for="twitter_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Twitter URL</label>
    <input value="{{ old('twitter_url', $information->twitter_url ?? null) }}" type="text" id="twitter_url" name="twitter_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>

<div class="mb-12">
    <label for="about_us_content">Content</label>
    <textarea name="about_us_content" class="tinymce-editor" id="about_us_content" cols="30" rows="10">{{ old('about_us_content', $information->about_us_content ?? null) }}</textarea>
</div>