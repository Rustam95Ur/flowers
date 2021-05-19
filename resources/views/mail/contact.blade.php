<table bgcolor="#FCFCFC" border="0" cellpadding="0" cellspacing="0"
       style="color:#444;background-color:#fcfcfc;margin:0;padding:0" width="100%">
    <tbody>
    <tr>
        <td>
            <center style="max-width:660px;width:100%;margin:0 auto">
                <table border="0" cellpadding="0" cellspacing="0" style="color:#444;margin:0 auto;padding:0"
                       width="100%">
                    <tbody>
                    <tr>
                        <td align="center" height="180" style="margin:0;padding:0;text-align:center" valign="center">
                            <a href="{{route('home')}}" target="_blank">
                                <img alt="" border="0"
                                     src="https://habrastorage.org/webt/dw/x2/s1/dwx2s1xrnjcwye2dbpdko8ncdpa.jpeg"
                                     width="130" class="CToWUd">
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" style="color:#444;margin:0;padding:0" width="100%">
                    <tbody>
                    <tr>
                        <td align="left" style="margin:0;padding:0;font-family:Arial,sans-serif;line-height:1.5">
                            <table align="center" border="0" cellpadding="0" cellspacing="0"
                                   style="color:#444;font-size:26px;padding-bottom:15px">
                                <tbody>
                                <tr>
                                    <td align="center">
                                    <td align="center">
                                        <h3 style="color:#4e7fad; text-transform: uppercase;">
                                            Сообщение от пользователя
                                        </h3>
                                    </td>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0"
                                   style="color:#444;background-color:#fff;font-size:16px;margin-bottom:20px;padding:15px;width:100%"
                                   width="100%">
                                <tbody>
                                <tr>
                                    <td style="padding-bottom:10px">
                                        <h3 style="text-align: center; margin-top: 50px">Информация о пользователе</h3>
                                        <p><b>Имя:</b> {{ $mail->name }}</p>
                                        <p><b>Email:</b> {{ $mail->email }}</p>
                                        <p><b>Тема:</b>&nbsp;{{ $mail->subject}}</p>
                                        <p><b>Сообщение:</b>&nbsp;{{ $mail->message }}</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </center>
            <table border="0" cellpadding="0" cellspacing="0" style="color:#444;margin:0;padding:0" width="100%">
                <tbody>
                <tr>
                    <td>
                        <center style="max-width:660px;width:100%;margin:0 auto;font-family:Arial,sans-serif">
                            <table border="0" cellpadding="0" cellspacing="0" style="color:#444" width="100%">
                                <tbody>
                                <tr>
                                    <td align="center"
                                        style="min-height:90px;padding:10px 0;table-layout:fixed;width:100%;font-size:0;text-align:center;background:#e7eeff;border-radius:6px"
                                        width="100%">
                                        <div
                                            style="display:inline-block;max-width:300px;vertical-align:middle;width:100%"
                                            valign="middle" width="100%">
                                            <table style="color:#444" width="100%">
                                                <tbody>
                                                <tr>
                                                    <td align="center" height="60"
                                                        style="margin:0;padding:0;font-family:Arial,sans-serif;font-size:14px"
                                                        valign="bottom">
                                                        <a href="#"
                                                           style="text-decoration:none;color:#007aff;margin-right:20px"
                                                           target="_blank">
                                                            <img
                                                                src="https://ci4.googleusercontent.com/proxy/Zjnd6cwwH3mHGpElO3ufSWH_xbe5luorzsjxe74aYlV-FAczOQg0kil10Vg7eqOV0CcH15_1hgcFfbT4ROD5oxyiS3ZY7ck=s0-d-e1-ft#https://stepik.org/static/emails/default/icon_vk.png"></a>
                                                        <a href="#"
                                                           style="text-decoration:none;color:#007aff;margin-right:20px"
                                                           target="_blank">
                                                            <img
                                                                src="https://ci3.googleusercontent.com/proxy/NXREyMijHnAhK6SQJr-e-SmsazKZquo2OYCGdIRbyq3YjBDmwantY06wi63vx3DNMox0CWVYMJkrxSJYb9wMcRJaBATUM5A=s0-d-e1-ft#https://stepik.org/static/emails/default/icon_fb.png"></a>
                                                        <a href="#"
                                                           style="text-decoration:none;color:#007aff" target="_blank">
                                                            <img
                                                                src="https://ci3.googleusercontent.com/proxy/b1Ll9KIpGn1pCm4A3lo_pS2mytewXVUByF3mmfRlUR6NCRtOEtA16bHf-3juJ_EqZzjquMDkzRVKNm44cav5LHpRjdW2Q4uw8NtEIQ=s0-d-e1-ft#https://stepik.org/static/emails/default/icon_twitter.png"></a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </center>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
