<div>
    <form action="{{route('test.login')}}" method="post">
        @csrf
        <input type="text" name="email" id="">
        <input type="text" name="password" id="">
        <input type="submit" value="Login">
    </form>
</div>
