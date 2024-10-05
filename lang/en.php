<?php

$lang["AccountVerification"] = "Welcome to {$conf['site_initials']}! Account Verification";

$lang["AccRegVer_template"] = "
Hello {{Sharlet}}, 

You requested an account on {$conf['site_initials']}.

In order to use this account, you need to <a href='" . $conf['site_url'] . "/verify?tok={$conf['verification_code']}'>Click Here</a> to complete the registration process.

Or use this unique code: <h1>{$conf['verification_code']}</h1>

This verification code will expire on: {$conf['ver_code_time']}.

Regards, 
Systems Admin 
{$conf['site_initials']}
";
?>
