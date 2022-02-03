@if($errors->any())
    <ul class ="alert alert-danger">
        <h4>Foi encontrado erros no preenchimento do formulário</h4>
    @foreach($errors->all() as $error)
       <li> {{$error}} </li>
    @endforeach
    @endif
</ul>
