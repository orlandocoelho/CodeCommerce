<!-- resources/views/emails/password.blade.php -->

Parabéns {{ $event->getUser()->name }}
O pedido {{ $event->getOrder()->id }}, foi realizado com sucesso!