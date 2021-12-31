<table width="690" style="margin:0 auto;" border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <tr style="background-color:#f0f0f0">
            <td width="100%" >
                <a
                    href="{{env('APP_URL')}}"
                    target="_blank"
                    >
                    <img
                        src="{{ asset('uploads/' . env('LOGO_URL'))}}"
                        alt="{{env('APP_NAME')}}"
                        style="display:block;padding:30px"
                        width="150"
                        border="0"
                        class="CToWUd" /></a>
            </td>
        </tr>
        <tr>
            <td width="100%" >
                <table
                    width="100%"
                    cellspacing="0"
                    cellpadding="0"
                    border="0"
                    bgcolor="#ffffff"
                    >
                    <tbody>
                        <tr>
                            <td width="100%" ></td>
                        </tr>
                        <tr>
                            <td  width="100%">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td width="100%">
                                                hi
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                your friend send the message to you.
                                                look for following:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <hr />
                                                <div style='padding:3rem;'>
                                                    {{$content}}
                                                </div>                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td height="24"></td>
                        </tr>
                        <tr>
                            <td>
                                <span
                                    style="color:#75787d;font-family:Helvetica,Arial,sans-serif;font-size:13px;font-weight:normal;line-height:1.5">© 2021 {{ env('APP_NAME') }}. All Rights Reserved.</span>
                            </td>
                        </tr>
                        <tr>
                            <td height="16"></td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>