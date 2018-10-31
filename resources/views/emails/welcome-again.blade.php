@component('mail::message')
Hi {{$user->name}}!

Thank you for registering on TheBlog. <br>
Please enjoy your time blogging on our website.


@component('mail::button', ['url' => 'http://homestead.blog'])
Go to TheBlog
@endcomponent

@component('mail::panel', ['url' => ''])
Happy Blogging.
@endcomponent

Thanks,<br>
TheBlog Team
@endcomponent
