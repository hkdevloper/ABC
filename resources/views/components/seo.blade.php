<div class="mt-3">
    <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Title</label>
    <input name="meta_title" type="text" class="input w-full border mt-2 flex-1" required
           placeholder="" value="{{old('meta_title')}}">
</div>
<div class="mt-3">
    <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Keywords</label>
    <input name="meta_keywords" type="text" class="input w-full border mt-2 flex-1" required
           placeholder=", (comma seperated values)" id="tag-keyword"
           value="{{old('meta_keywords')}}">
</div>
<div class="mt-3">
    <label class="w-full sm:w-20 sm:text-right sm:mr-5">Meta Description</label>
    <input name="meta_description" type="text" class="input w-full border mt-2 flex-1"
           required
           placeholder="" value="{{old('meta_description')}}">
</div>
