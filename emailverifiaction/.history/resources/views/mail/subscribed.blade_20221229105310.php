<h1>
    user has subscribed.
</h1>

# Order Shipped
 
Your order has been shipped!
 
<x-mail::button :url="$url">
View Order
</x-mail::button>
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>