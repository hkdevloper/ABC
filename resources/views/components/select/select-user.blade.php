<div class="mt-3">
    <label>Select User</label>
    <select name="user" required class="select2 input w-full border mt-2">
        <option selected>Select user</option>
        @foreach($users as $user)
            <option {{$selected == $user->id ? "selected" : ""}} value="{{$user->id}}">{{$user->first_name}}
                &nbsp;{{$user->last_name}}
                &nbsp;[Id: {{$user->id}}]
            </option>
        @endforeach
    </select>
</div>
