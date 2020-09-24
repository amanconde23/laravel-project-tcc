@extends('layouts.app')

@section('content')
    <div class="container conteudo-menor">
        <div class="row">
            <div class="col-md-12 meu-perfil">
                <h1 class="titulo-meu-perfil">Meu Perfil</h1>
                <div class="box-meu-perfil">
                    <p><strong>Nome: </strong>{{ $user->name }}</p>
                    <p><strong>Email: </strong>{{ $user->email }}</p>
                    <p class="item-box-meu-perfil"><strong>Telefone: </strong>{{ $user->phone }}</p>
                </div>

                <div class="btn-crud">
                    <a class="btn btn-warning" href="{{ route('user-edit-form', ['user' => Auth::user()->id]) }}">Editar Usuário</a>
                    <form action="{{ route('user-destroy', ['user' => Auth::user()->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="user-destroy'" value="{{ $user->id }}">
                        <button type="submit" class="btn btn-danger">Excluir Perfil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
