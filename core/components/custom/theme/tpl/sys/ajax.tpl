{switch $.request.script}
    {case 'example'}
        {'@FILE forms/contact_form.php' | snippet : ['action' => 'ajax']}
    {case 'example2'}
        {'@FILE companies/companies_ajax_response.tpl' | chunk}
{/switch}