{switch $.request.script}
    {case 'contactForm'}
        {'@FILE forms/contact.php' | snippet}
{/switch}