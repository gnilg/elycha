@extends('layouts.back_base_layout')
@section('title')
    Chat Appli
@endsection
<?php
$user = count($messages) > 0 ? $messages[0]->user : null;
?>
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Accueil</a></li>
                            <li class="breadcrumb-item active">Chat Appli</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Chat Appli</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <!-- start chat users-->
            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-start mb-3">
                            <img src="/avatars/default.png" class="me-2 rounded-circle" height="42" alt="Brandon Smith">
                            <div class="w-100">
                                <h5 class="mt-0 mb-0 font-14">
                                    <a href="#"
                                        class="text-reset">{{ getAdminAuth()->first_name . ' ' . getAdminAuth()->last_name }}</a>
                                </h5>
                                <p class="mt-1 mb-0 text-muted font-14">
                                    <small class="mdi mdi-circle text-success"></small> En ligne
                                </p>
                            </div>
                        </div>

                        <!-- start search box -->
                        <form class="search-bar mb-3">
                            <div class="position-relative">
                                <input type="text" class="form-control form-control-light"
                                    placeholder="Rechercher un utilisateur">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>
                        <!-- end search box -->

                        <h6 class="font-13 text-muted text-uppercase mb-2">Utilisateurs</h6>

                        <!-- users -->
                        <div class="row">
                            <div class="col">
                                <div data-simplebar style="max-height: 400px;">
                                    @foreach ($messages as $message)
                                        <a href="javascript:void(0);" onclick="fetchdata({{ $message->user->id }})"
                                            class="text-body">
                                            <div class="d-flex align-items-start p-2">
                                                <img src="{{ $message->user->avatar }}" class="me-2 rounded-circle"
                                                    height="42"
                                                    alt="{{ $message->user->first_name . ' ' . $message->user->last_name }}" />
                                                <div class="w-100">
                                                    <h5 class="mt-0 mb-0 font-14">
                                                        <span
                                                            class="float-end text-muted fw-normal font-12">{{ getTimeOrDate($message->created_at) }}</span>
                                                        {{ $message->user->first_name . ' ' . $message->user->last_name }}
                                                    </h5>
                                                    <p class="mt-1 mb-0 text-muted font-14">
                                                        <span
                                                            class="w-75">{{ strlen($message->contenu) > 30 ? substr($message->contenu, 0, 30) . '' : $message->contenu }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <!-- end slimscroll-->
                            </div>
                            <!-- End col -->
                        </div>
                        <!-- end users -->
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
            <!-- end chat users-->

            <!-- chat area -->
            <div class="col-xl-9 col-lg-8">
                @if ($user != null)
                    <div class="card">
                        <div class="card-body py-2 px-3 border-bottom border-light">
                            <div class="row justify-content-between py-1">
                                <div class="col-sm-7">
                                    <div class="d-flex align-items-start">
                                        <img id="currentAvatar" src="{{ $user->avatar }}" class="me-2 rounded-circle"
                                            height="36" alt="{{ $user->first_name . ' ' . $user->last_name }}">
                                        <div>
                                            <h5 class="mt-0 mb-0 font-15">
                                                <a href="#" class="text-reset"
                                                    id="currentUser">{{ $user->first_name . ' ' . $user->last_name }}</a>
                                            </h5>
                                            <p class="mt-1 mb-0 text-muted font-12" id="chat-online">
                                                <small class="mdi mdi-circle text-success"></small> En ligne
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="conversation-list chat-content" data-simplebar
                                style="max-height: 460px;overflow:auto">
                                {{-- <li class="clearfix">
                                    <div class="chat-avatar">
                                        <img src="/assets/images/users/user-5.jpg" alt="James Z" class="rounded" />
                                        <i>10:04</i>
                                    </div>
                                    <div class="conversation-text">
                                        <div class="ctext-wrap">
                                            <i>James Z</i>
                                            <p>
                                                We can also discuss about the presentation talk format if you have some
                                                extra
                                                mins
                                            </p>
                                        </div>
                                    </div>
                                    <div class="conversation-actions dropdown">
                                        <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                            aria-expanded="false"><i class="mdi mdi-dots-vertical font-16"></i></button>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Copy Message</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li> --}}

                            </ul>

                            <div class="row">
                                <div class="col">
                                    <div class="mt-2 bg-light p-3 rounded">
                                        <form id="chat-form" method="post" action="">
                                            <div class="row">
                                                <div class="col mb-2 mb-sm-0">
                                                    <input type="text" class="form-control border-0"
                                                        placeholder="Tapez votre message" required>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <div class="btn-group">
                                                        <button type="submit" class="btn btn-success chat-send w-100"><i
                                                                class="fe-send"></i></button>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end col-->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card-body -->
                    </div> <!-- end card -->
                @endif
            </div>
            <!-- end chat area-->

        </div> <!-- end row-->


    </div>
@endsection
@section('script')
    <script>
        var idUser = {{ $user != null ? $user->id : 0 }}
        var adminId = {{ getAdminAuth()->id }}

        function updateChat(messages) {
            $(".chat-content").empty();
            var chats = [];

            $.each(messages, function(index, value) {
                var user = value["user"];
                var finalsender = "";
                if (user) {
                    finalsender = user.last_name + ' ' + user.first_name
                } else {
                    finalsender = "Admin"
                }
                $("#currentAvatar").attr("src", "/avatars/default.png");
                $("#currentUser").text(user.last_name + ' ' + user.first_name);
                idUser = user.id;
                var item = {
                    id: value["id"],
                    text: value["content"],
                    time: value["time"],
                    sender: finalsender,
                    picture: (value["sender_type"] == 1) ? "/avatars/default.png" :
                        "/assets/images/logo-sm.png",
                    position: (value["sender_type"] == 1) ? '' : 'odd',
                };
                chats.push(item);
            });

            chats.forEach(chat => {
                append_element = '<li class="clearfix ' + chat.position + '" onclick="deleteMessage(' + chat.id +
                    ')">' +
                    '<div class="chat-avatar"><img src="' + chat.picture + '" alt="' + chat.sender +
                    '" class="rounded"/>' +
                    '<i>' + chat.time + '</i></div>' +
                    '<div class="conversation-text"><div class="ctext-wrap" >' +
                    '<i>' + chat.sender + '</i><p>' + chat.text + '</p>'
                '</div></div></li>';

                $('.chat-content').append($(append_element).fadeIn());
            });

        }

        var data = {
            'data': idUser
        };

        function deleteMessage(idMessage) {
            Swal.fire({
                title: 'Voulez-vous supprimer ce message?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'OUI',
                denyButtonText: 'Annuler',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'get',
                        url: '/api/ligne-verte/delete-message/' + idMessage,
                        type: 'json',
                        data: {},
                        enctype: 'multipart/form-data',
                        statusCode: {
                            422: function(data) {
                                var errors = data.responseJSON.errors;
                                console.log(errors);
                            }
                        },
                    }).done(function(data) {
                        updateChat(data)
                    }).fail(function(data) {
                        console.log(data.responseJSON.errors);
                    })
                }
            })
        }

        function fetchdata(id = idUser) {
            $.ajax({
                method: 'get',
                url: '/api/' + id + '/chat/messages',
                type: 'json',
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentData: false,
                statusCode: {
                    422: function(data) {
                        var errors = data.responseJSON.errors;
                        console.log(errors);
                    }
                },
            }).done(function(data) {
                updateChat(data)
            }).fail(function(data) {
                console.log(data.responseJSON.errors);
            })
        }
        fetchdata();
        setInterval(fetchdata, 15000);


        $("#chat-form").submit(function() {
            var me = $(this);
            if (me.find('input').val().trim().length > 0) {
                var message = me.find('input').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'post',
                    url: '/api/' + idUser + '/chat/send-message-admin',
                    type: 'json',
                    data: {
                        content: message,
                        admin_id: adminId
                    },
                    enctype: 'multipart/form-data',
                    statusCode: {
                        422: function(data) {
                            var errors = data.responseJSON.errors;
                            console.log(errors);
                        }
                    },
                }).done(function(data) {
                    me.find('input').val("")
                    updateChat(data)
                }).fail(function(data) {
                    console.log(data.responseJSON.errors);
                })
            }

            return false;
        });
    </script>
@endsection
