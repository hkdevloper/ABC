<div class="mt-3">
    <label>Category</label>
    <select name="category" required class="select2 input w-full border mt-2">
        <option selected>Select Category</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>
