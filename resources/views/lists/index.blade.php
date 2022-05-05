@auth

@extends('layouts.kanban')

@section('lists')
<div class="style-user" style="background-image: url('{{ asset(Auth::user()->cover_app) }}');">
    <div class="tools-img">
        <div class="change-img hidden" id="form-img">
            <div class="form">
                <form action="{{route('user.update', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                    <div class="form">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        <input type="hidden" name="password" value="{{ Auth::user()->password }}">
                        <div class="input-img">
                            <input type="file" name="cover_app" />
                        </div>
                        <div class="button-img">
                            <button type="submit" class=""> Modifier </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="change-img hidden" id="form-img">
            <form action="{{route('img.remove', Auth::user()->id)}}" method="post" class="form-sup-img">
                <div class="form">
                    @csrf
                    @method('PUT')
                    <div class="input-img">
                        <input type="hidden" name="cover_app" value="" />
                    </div>
                    <div class="button-sup-img">
                        <button type="submit" class=""> <i class="fa-solid fa-trash-can"></i> </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="change-img" id="icon-img" onclick="change_img()">
            <i class="fa-solid fa-image"></i>
        </div>
    </div>

    @foreach ($lists as  $key_list => $list)

        @if($list->user_id === Auth::user()->id)
        <div class="list">

            <div class="options">
                <form action="{{route('app.destroy', $list->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </form>        
            </div>
            <div class="hidden" id="form-list-title">
                <form action='{{ route('app.update', $list->id) }}' method='POST' class="title">
                    @csrf
                    @method('PUT')
                    <div class="title">
                        <div class="input">
                            <input type="text" name="title" value="{{$list->title}}" required>
                        </div>
                        <div class="button">
                            <button type="submit"> <i class="fa-solid fa-plus"></i> </button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="lists-title">
                <h3 class="list-title" ondblclick="edit_list({{ $key_list }})">{{ $list->title }}</h3>
            </div>

            <ul class="list-items">

                @foreach($cards as $key_card => $card)
                    @if($card->lists_id === $list->id && $card->user_id === Auth::user()->id)
                        <li>                        
                            <div class="card"  >
                                <div class="options">
                                    <button id="cardDropdown" class="btn-delete" onclick="show_options()">
                                        <i class="fa-solid fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" id="cardMenuDropdown">

                                        <a class="dropdown-item" href="{{ route('cards.show', $card->id) }}">Visualiser</a>
                                    
                                        <a class="dropdown-item" href="{{ route('app.index') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('card-sup-form').submit();">
                                            Supprimer
                                        </a>                                
        
                                        <form action="{{route('cards.destroy', $card->id)}}" method="post" id="card-sup-form">
                                            @csrf
                                            @method('DELETE')
                                        </form>   
                                    </div>
                                </div>
<!--
                                <div class="view">
                                        <button onclick="location.href='{{route('cards.show', $card->id)}}'" class="btn-delete">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </form>        
                                </div>
                                    
                                <div class="options">
                                    <form action="{{route('cards.destroy', $card->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>        
                                </div>
-->
                                @isset($card->cover_image)
                                    <div style="background-image: url('{{ $card->cover_image }}')" class="cover-image" onlclick="locate.href='{{ route('cards.show', $card->id) }};'"></div>
                                @endisset

                                <div class="hidden" id="form-card-title" data-key="{{$key_card}}">
                                    <form action='{{ route('cards.update', $card->id) }}' method='POST' class="title">
                                        @csrf
                                        @method('PUT')
                                        <div class="title">
                                            <div class="input">
                                                <input type="text" name="title" value="{{$card->title}}" required autofocus>
                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                <input type="hidden" name="lists_id" value="{{$list->id}}">
                                                <input type="hidden" name="content" value="{{$card->content}}">
                                                <input type="hidden" name="cover_image" value="{{$card->cover_image}}">

                                            </div>
                                            <div class="button">
                                                <button type="submit"> <i class="fa-solid fa-plus"></i> </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="card-title" data-key="{{$key_card}}">
                                    <p class="card-title" ondblclick="edit_card({{ $key_card }})">{{ $card->title }}</h3>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            
                <li class="hidden new-li" id="new-card" style="margin: 8px 0px;">
                    <form action="{{ route('cards.store') }}" method="post" class="title">
                        @csrf

                        <input type="hidden" name="lists_id" value="{{$list->id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="input">
                            <input type="text" name="title" placeholder="Ajouter titre du card" required autofocus>
                        </div>
                        <div class="button">
                            <button type="submit"> <i class="fa-solid fa-plus"></i> </button>
                        </div>
                    </form>
                </li>

                <div class="new-card" onclick="cards_create({{ $key_list }})">
                    <button class="add-card-btn btn">
                        <i class="fa-solid fa-plus"></i> Créer un nouveau card
                    </button>
                </a>
            </ul>
        </div>
        @endif
        
    @endforeach

    <div class="list hidden" id="list-new">
            <form action="{{route('app.store')}}" method="post" class="title">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="input"><input type="text" name="title" placeholder="Ajouter titre de la list" required autofocus></div>
                <div class="button"><button type="submit"> <i class="fa-solid fa-plus"></i> </button></div>
            </form>
    </div>


    <div class="plus-list" onclick="lists_create()">
        <i class="fa-solid fa-plus"></i> Créer un nouvelle list
    </div>
</div>
@endsection

@endauth