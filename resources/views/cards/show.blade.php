@auth

@extends('layouts.kanban')


@section('card')
@if ($card->user_id === Auth::user()->id)

<div class='bg-card'>
    <div class="box-card">

        <div class="close">
            <a href="{{route('app.index')}}">
                <i class="fa-solid fa-xmark"></i>
            </a>        
        </div>

        <div class="card-cover" style="background-image: url('{{ asset($card->cover_image)}}');">
            @if($card->cover_image === null)
            <div class="change-img">
                <form action="{{route('cards.update', $card->id)}}" method="post" class="hidden" id="form-img" enctype="multipart/form-data">
                    <div class="form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="title" value="{{ $card->title }}">
                    <input type="hidden" name="user_id" value="{{ $card->user_id }}">
                    <input type="hidden" name="lists_id" value="{{ $card->lists_id }}">
                    <input type="hidden" name="content" value="{{ $card->content }}">
                    <div class="input-img">
                        <input type="file" name="cover_image" />
                    </div>
                    <div class="button-img">
                        <button type="submit" class=""> Modifier </button>
                    </div></div>
                </form>
        
                <div id="icon-img" onclick="change_img()"><i class="fa-solid fa-image"></i></div>
            </div>
            @else    
            
            <div class="tools-img">
                <div class="change-img hidden" id="form-img">
                    <div class="form">
                        <form action="{{route('cards.update', $card->id)}}" method="post" enctype="multipart/form-data">
                            <div class="form">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="title" value="{{ $card->title }}">
                                <input type="hidden" name="user_id" value="{{ $card->user_id }}">
                                <input type="hidden" name="lists_id" value="{{ $card->lists_id }}">
                                <input type="hidden" name="content" value="{{ $card->content }}">
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
                    <form action="{{route('card.removeIMG', $card->id)}}" method="post" class="form-sup-img">
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

            @endif
        </div>

        <div class="out-image">

            <div class="card-show-title">
                <span ondblclick="change_title()" id="title_current">{{ $card->title }}</span>

                <form action="{{route('cards.update', $card->id)}}" class="hidden"  method="post" id="form_title">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="cover_image" value="{{ $card->cover_image }}">

                    <input type="text" name="title" value="{{ $card->title }}">
                    <input type="hidden" name="user_id" value="{{ $card->user_id }}">
                    <input type="hidden" name="lists_id" value="{{ $card->lists_id }}">
                    <input type="hidden" name="content" value="{{ $card->content }}">
                </form>
            </div>
            
            <div class="card-grid">
                <div class="card-content">

                    <p ondblclick="change_content2()" id="current_content">
                        {{ $card->content }}
                    </p>
                    
                    @if($card->content === null)
                        <p onclick="change_content()" id="new_content"><i class="fa-solid fa-plus"></i></p>
                    @endif

                    <form action="{{route('cards.update', $card->id)}}" class="hidden"  method="post" id="form-content">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="cover_image" value="{{ $card->cover_image }}">

                        <input type="hidden" name="title" value="{{ $card->title }}">
                        <input type="hidden" name="user_id" value="{{ $card->user_id }}">
                        <input type="hidden" name="lists_id" value="{{ $card->lists_id }}">
                        <textarea  name="content">{{$card->content}}</textarea>

                        <button type="submit" class="btn-content">Submit</button>
                    </form>

                </div>
                <div class="card-tools">
                    <div class="move">
                        @foreach ($lists as $list)

                            @if($card->lists_id !== $list->id && $list->user_id == Auth::user()->id)
                                <form action="{{ route('cards.update',$card->id) }}" method="POST"> 
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="cover_image" value="{{ $card->cover_image }}">

                                    <input type="hidden" name="title" value="{{ $card->title }}">
                                    <input type="hidden" name="user_id" value="{{ $card->user_id }}">
                                    <input type="hidden" name="lists_id" value="{{ $list->id }}">
                                    <input type="hidden" name="content" value="{{ $card->content }}">

                                    @if ($card->lists_id < $list->id)

                                    <button type="submit" class="btn-move">
                                        <div class="move-item">{{ $list->title }}</div>
                                        <div class="move-arrow"><i class="fa-solid fa-arrow-right"></i></div>
                                    </button>

                                    @endif

                                    @if ($card->lists_id > $list->id)

                                    <button type="submit" class="btn-move">
                                        <div class="move-arrow"><i class="fa-solid fa-arrow-left"></i></div>
                                        <div class="move-item">{{ $list->title }}</div>
                                    </button>

                                    @endif
                                </form> 
                            @endif  

                        @endforeach
                    </div>

                    <div class="user">

                        <div onclick="card_user()" id="user-id-title">
                            <div class="btn-user">
                                <p>Owner: {{ $owner->name }}</p> <i class="fa-solid fa-pen-to-square"></i>
                            </div>
                        </div>

                        <div class="user-edit hidden" id="user-id-form">
                            <form action=" {{ route('cards.update', $card->id) }} " method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="cover_image" value="{{ $card->cover_image }}">

                                <input type="hidden" name="title" value="{{ $card->title }}">
                                <input type="hidden" name="content" value="{{ $card->content }}">
                                <input type="hidden" name="lists_id" value="{{ $card->lists_id }}">
                                <p>Select thew new owner</p>
                                <select name="user_id" onchange="this.form.submit()">
                                    <option value="" >Select a new</option>
                                    @foreach($users as $user)
                                        @if($user->id !== $card->user_id)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </form>
                        </div>

                    </div>  

                    <div class="delete">
                        <form action="{{ route('cards.destroy', $card->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                            <p>Supprimer</p>
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@endauth