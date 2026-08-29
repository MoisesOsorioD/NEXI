@extends('layouts.dashboard')

@section('title', 'Chat | NEXI')

@section('page-title', 'Chat')

@section('content')

<style>

    /* =========================================
       CONTENEDOR PRINCIPAL
    ========================================= */

    .chat-container {
        height: calc(100vh - 150px);
        min-height: 620px;
        background: #ffffff;
        border: 1px solid #e3e9ec;
        border-radius: 22px;
        overflow: hidden;
        display: flex;
        box-shadow: 0 8px 30px rgba(39, 65, 75, 0.06);
    }


    /* =========================================
       LISTA DE CONVERSACIONES
    ========================================= */

    .conversation-panel {
        width: 330px;
        min-width: 330px;
        border-right: 1px solid #e5eaec;
        background: #ffffff;
        display: flex;
        flex-direction: column;
    }

    .conversation-header {
        padding: 25px 22px 18px;
        border-bottom: 1px solid #edf0f1;
    }

    .conversation-header h4 {
        margin: 0;
        color: #294b57;
        font-weight: 700;
        font-size: 21px;
    }

    .conversation-header p {
        margin: 5px 0 18px;
        color: #8a969b;
        font-size: 13px;
    }


    /* Buscador */

    .chat-search {
        position: relative;
    }

    .chat-search i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #9aa6ab;
        font-size: 13px;
    }

    .chat-search input {
        width: 100%;
        border: 1px solid #e4e9eb;
        background: #f7f9fa;
        border-radius: 11px;
        padding: 10px 12px 10px 38px;
        outline: none;
        font-size: 13px;
        transition: 0.2s ease;
    }

    .chat-search input:focus {
        border-color: #9eb4bc;
        background: #ffffff;
        box-shadow: 0 0 0 3px rgba(54, 87, 99, 0.06);
    }


    /* Conversaciones */

    .conversation-list {
        flex: 1;
        overflow-y: auto;
        padding: 10px;
    }

    .conversation-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 13px 12px;
        border-radius: 14px;
        cursor: pointer;
        transition: 0.2s ease;
        margin-bottom: 4px;
    }

    .conversation-item:hover {
        background: #f4f7f8;
    }

    .conversation-item.active {
        background: #edf4f5;
    }

    .conversation-avatar {
        width: 46px;
        height: 46px;
        min-width: 46px;
        border-radius: 14px;
        background: #365763;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        position: relative;
    }

    .conversation-avatar.yellow {
        background: #fdbb08;
        color: #294b57;
    }

    .conversation-avatar.blue {
        background: #e2f4f8;
        color: #13a8c5;
    }

    .online-dot {
        position: absolute;
        width: 11px;
        height: 11px;
        border-radius: 50%;
        background: #24b47e;
        border: 2px solid white;
        right: -1px;
        bottom: -1px;
    }

    .conversation-info {
        min-width: 0;
        flex: 1;
    }

    .conversation-name {
        color: #294b57;
        font-weight: 700;
        font-size: 14px;
        margin-bottom: 3px;
    }

    .conversation-message {
        color: #89969b;
        font-size: 12px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .conversation-meta {
        align-self: flex-start;
        text-align: right;
    }

    .conversation-time {
        color: #a0aaae;
        font-size: 10px;
    }

    .unread {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #fdbb08;
        color: #294b57;
        width: 19px;
        height: 19px;
        border-radius: 50%;
        font-size: 10px;
        font-weight: 700;
        margin-top: 5px;
    }


    /* =========================================
       PANEL DEL CHAT
    ========================================= */

    .chat-panel {
        flex: 1;
        display: flex;
        flex-direction: column;
        min-width: 0;
        background: #f8fafb;
    }


    /* Header */

    .chat-header {
        height: 78px;
        background: #ffffff;
        border-bottom: 1px solid #e5eaec;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 25px;
    }

    .chat-user {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .chat-user-avatar {
        width: 45px;
        height: 45px;
        border-radius: 14px;
        background: #fdbb08;
        color: #294b57;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
    }

    .chat-user-info h6 {
        margin: 0;
        color: #294b57;
        font-weight: 700;
        font-size: 14px;
    }

    .chat-user-status {
        color: #24a778;
        font-size: 11px;
        margin-top: 3px;
    }

    .chat-user-status::before {
        content: "";
        display: inline-block;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #24b47e;
        margin-right: 5px;
    }


    /* Botones del header */

    .chat-header-actions {
        display: flex;
        gap: 7px;
    }

    .chat-action {
        width: 38px;
        height: 38px;
        border: none;
        border-radius: 11px;
        background: #f3f6f7;
        color: #60757d;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.2s ease;
    }

    .chat-action:hover {
        background: #e8eff1;
        color: #294b57;
    }


    /* =========================================
       MENSAJES
    ========================================= */

    .messages-area {
        flex: 1;
        overflow-y: auto;
        padding: 30px;
    }

    .date-divider {
        display: flex;
        align-items: center;
        gap: 15px;
        margin: 5px 0 25px;
        color: #9aa5aa;
        font-size: 11px;
    }

    .date-divider::before,
    .date-divider::after {
        content: "";
        height: 1px;
        background: #e2e7e9;
        flex: 1;
    }


    /* Mensaje */

    .message-row {
        display: flex;
        margin-bottom: 18px;
    }

    .message-row.received {
        justify-content: flex-start;
    }

    .message-row.sent {
        justify-content: flex-end;
    }

    .message {
        max-width: 65%;
        display: flex;
        flex-direction: column;
    }

    .message-bubble {
        padding: 12px 16px;
        border-radius: 17px;
        font-size: 13px;
        line-height: 1.55;
    }

    .received .message-bubble {
        background: #ffffff;
        color: #4c5e65;
        border: 1px solid #e5eaec;
        border-bottom-left-radius: 5px;
    }

    .sent .message-bubble {
        background: #365763;
        color: #ffffff;
        border-bottom-right-radius: 5px;
    }

    .message-time {
        color: #a0aaae;
        font-size: 10px;
        margin-top: 5px;
    }

    .sent .message-time {
        text-align: right;
    }


    /* =========================================
       INPUT
    ========================================= */

    .message-input-area {
        padding: 15px 20px 18px;
        background: #ffffff;
        border-top: 1px solid #e4e9eb;
    }

    .message-form {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f5f8f9;
        border: 1px solid #e2e8ea;
        border-radius: 15px;
        padding: 6px;
    }

    .message-tool {
        width: 38px;
        height: 38px;
        min-width: 38px;
        border: none;
        background: transparent;
        color: #829198;
        border-radius: 10px;
        transition: 0.2s ease;
    }

    .message-tool:hover {
        background: #e8eef0;
        color: #365763;
    }

    .message-input {
        flex: 1;
        border: none;
        outline: none;
        background: transparent;
        padding: 10px 5px;
        color: #45575e;
        font-size: 13px;
    }

    .message-input::placeholder {
        color: #9aa5aa;
    }

    .send-button {
        width: 42px;
        height: 42px;
        border: none;
        border-radius: 12px;
        background: #fdbb08;
        color: #294b57;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.2s ease;
    }

    .send-button:hover {
        background: #f4ae00;
        transform: translateY(-1px);
    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 900px) {

        .conversation-panel {
            width: 280px;
            min-width: 280px;
        }

        .message {
            max-width: 78%;
        }
    }


    @media (max-width: 700px) {

        .chat-container {
            min-height: 650px;
            height: calc(100vh - 130px);
        }

        .conversation-panel {
            width: 85px;
            min-width: 85px;
        }

        .conversation-header h4,
        .conversation-header p,
        .chat-search,
        .conversation-info,
        .conversation-meta {
            display: none;
        }

        .conversation-header {
            padding: 15px;
            text-align: center;
        }

        .conversation-list {
            padding: 8px;
        }

        .conversation-item {
            justify-content: center;
            padding: 10px;
        }

        .conversation-avatar {
            width: 45px;
            height: 45px;
        }

        .chat-header {
            padding: 0 15px;
        }

        .chat-header-actions {
            display: none;
        }

        .messages-area {
            padding: 20px 15px;
        }

        .message {
            max-width: 85%;
        }
    }

</style>


<div class="chat-container">

    {{-- =========================================
         CONVERSACIONES
    ========================================= --}}

    <aside class="conversation-panel">

        <div class="conversation-header">

            <h4>Mensajes</h4>

            <p>
                Comunícate con tus clientes
            </p>

            <div class="chat-search">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="text"
                    placeholder="Buscar conversación..."
                >

            </div>

        </div>


        <div class="conversation-list">

            {{-- Conversación activa --}}

            <div class="conversation-item active">

                <div class="conversation-avatar yellow">

                    CM

                    <span class="online-dot"></span>

                </div>

                <div class="conversation-info">

                    <div class="conversation-name">
                        Carlos Martínez
                    </div>

                    <div class="conversation-message">
                        Hola, ¿todavía tienen café disponible?
                    </div>

                </div>

                <div class="conversation-meta">

                    <div class="conversation-time">
                        9:28 AM
                    </div>

                    <span class="unread">
                        2
                    </span>

                </div>

            </div>


            {{-- Conversación 2 --}}

            <div class="conversation-item">

                <div class="conversation-avatar blue">

                    AL

                </div>

                <div class="conversation-info">

                    <div class="conversation-name">
                        Ana López
                    </div>

                    <div class="conversation-message">
                        Muchas gracias por la información.
                    </div>

                </div>

                <div class="conversation-meta">

                    <div class="conversation-time">
                        Ayer
                    </div>

                </div>

            </div>


            {{-- Conversación 3 --}}

            <div class="conversation-item">

                <div class="conversation-avatar">

                    JP

                    <span class="online-dot"></span>

                </div>

                <div class="conversation-info">

                    <div class="conversation-name">
                        Juan Pérez
                    </div>

                    <div class="conversation-message">
                        ¿Realizan entregas a Managua?
                    </div>

                </div>

                <div class="conversation-meta">

                    <div class="conversation-time">
                        Lun
                    </div>

                    <span class="unread">
                        1
                    </span>

                </div>

            </div>


            {{-- Conversación 4 --}}

            <div class="conversation-item">

                <div class="conversation-avatar blue">

                    MS

                </div>

                <div class="conversation-info">

                    <div class="conversation-name">
                        María Silva
                    </div>

                    <div class="conversation-message">
                        Perfecto, quedamos así.
                    </div>

                </div>

                <div class="conversation-meta">

                    <div class="conversation-time">
                        Dom
                    </div>

                </div>

            </div>


            {{-- Conversación 5 --}}

            <div class="conversation-item">

                <div class="conversation-avatar yellow">

                    RG

                </div>

                <div class="conversation-info">

                    <div class="conversation-name">
                        Roberto García
                    </div>

                    <div class="conversation-message">
                        ¿Me puede enviar el catálogo?
                    </div>

                </div>

                <div class="conversation-meta">

                    <div class="conversation-time">
                        Vie
                    </div>

                </div>

            </div>

        </div>

    </aside>


    {{-- =========================================
         CHAT
    ========================================= --}}

    <section class="chat-panel">


        {{-- Header del chat --}}

        <header class="chat-header">

            <div class="chat-user">

                <div class="chat-user-avatar">
                    CM
                </div>

                <div class="chat-user-info">

                    <h6>
                        Carlos Martínez
                    </h6>

                    <div class="chat-user-status">
                        En línea
                    </div>

                </div>

            </div>


            <div class="chat-header-actions">

                <button class="chat-action" title="Buscar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>

                <button class="chat-action" title="Información">
                    <i class="fa-solid fa-circle-info"></i>
                </button>

                <button class="chat-action" title="Más opciones">
                    <i class="fa-solid fa-ellipsis"></i>
                </button>

            </div>

        </header>


        {{-- =========================================
             MENSAJES
        ========================================= --}}

        <div class="messages-area" id="messagesArea">

            <div class="date-divider">
                Hoy
            </div>


            {{-- Mensaje recibido --}}

            <div class="message-row received">

                <div class="message">

                    <div class="message-bubble">

                        Hola, buenos días. Estoy interesado en
                        comprar café para mi negocio.

                    </div>

                    <span class="message-time">
                        9:18 AM
                    </span>

                </div>

            </div>


            {{-- Mensaje enviado --}}

            <div class="message-row sent">

                <div class="message">

                    <div class="message-bubble">

                        ¡Hola, Carlos! Claro que sí.
                        Tenemos café disponible en diferentes presentaciones.

                    </div>

                    <span class="message-time">
                        9:20 AM
                    </span>

                </div>

            </div>


            {{-- Mensaje recibido --}}

            <div class="message-row received">

                <div class="message">

                    <div class="message-bubble">

                        Excelente. ¿Me podría compartir las
                        presentaciones y los precios?

                    </div>

                    <span class="message-time">
                        9:23 AM
                    </span>

                </div>

            </div>


            {{-- Mensaje enviado --}}

            <div class="message-row sent">

                <div class="message">

                    <div class="message-bubble">

                        Por supuesto. Tenemos presentaciones
                        de 1, 5 y 10 libras. También podemos
                        conversar sobre precios por cantidad.

                    </div>

                    <span class="message-time">
                        9:25 AM
                    </span>

                </div>

            </div>


            {{-- Mensaje recibido --}}

            <div class="message-row received">

                <div class="message">

                    <div class="message-bubble">

                        Perfecto, me interesa la presentación de
                        10 libras. ¿Todavía tienen disponible?

                    </div>

                    <span class="message-time">
                        9:28 AM
                    </span>

                </div>

            </div>

        </div>


        {{-- =========================================
             ESCRIBIR MENSAJE
        ========================================= --}}

        <div class="message-input-area">

            <form
                class="message-form"
                id="messageForm"
            >

                @csrf

                <button
                    type="button"
                    class="message-tool"
                    title="Adjuntar archivo"
                >
                    <i class="fa-solid fa-paperclip"></i>
                </button>


                <input
                    type="text"
                    id="messageInput"
                    class="message-input"
                    placeholder="Escribe un mensaje..."
                    autocomplete="off"
                >


                <button
                    type="button"
                    class="message-tool"
                    title="Emoji"
                >
                    <i class="fa-regular fa-face-smile"></i>
                </button>


                <button
                    type="submit"
                    class="send-button"
                    title="Enviar"
                >
                    <i class="fa-solid fa-paper-plane"></i>
                </button>

            </form>

        </div>

    </section>

</div>


{{-- =========================================
     JAVASCRIPT
     SOLO PARA LA DEMOSTRACIÓN DEL FRONTEND
========================================= --}}

<script>

    const messageForm = document.getElementById('messageForm');
    const messageInput = document.getElementById('messageInput');
    const messagesArea = document.getElementById('messagesArea');

    messageForm.addEventListener('submit', function (event) {

        event.preventDefault();

        const messageText = messageInput.value.trim();

        if (messageText === '') {
            return;
        }

        const messageRow = document.createElement('div');

        messageRow.className = 'message-row sent';

        messageRow.innerHTML = `
            <div class="message">

                <div class="message-bubble">
                    ${messageText}
                </div>

                <span class="message-time">
                    Ahora
                </span>

            </div>
        `;

        messagesArea.appendChild(messageRow);

        messageInput.value = '';

        messagesArea.scrollTop = messagesArea.scrollHeight;

    });


    // Seleccionar conversación

    const conversations =
        document.querySelectorAll('.conversation-item');

    conversations.forEach(function (conversation) {

        conversation.addEventListener('click', function () {

            conversations.forEach(function (item) {
                item.classList.remove('active');
            });

            conversation.classList.add('active');

        });

    });

</script>

@endsection