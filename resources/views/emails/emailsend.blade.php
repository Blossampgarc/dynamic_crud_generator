<!DOCTYPE html>
<!--Code By Webdevtrick ( https://webdevtrick.com )-->
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Send email</title>
   </head>
   <body>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
         <!--HEADER -->
         <tbody>
            <tr>
               <td align="center">
                  <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-right:20px; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                     <tbody>
                        <tr>
                           <td height="35"></td>
                        </tr>
                        <tr>
                           <td align="center" style="font-family: 'Raleway', sans-serif; font-size:22px; font-weight: bold; color:#333;">New Email</td>
                        </tr>
                        <tr>
                           <td height="10"></td>
                        </tr>
                        <tr>
                           <td align="left" style="font-family: 'Lato', sans-serif; font-size:14px; color:#757575;padding: 0px 51px;line-height: 0.8rem; font-weight: 300;">
                              <p>Name : <b><?=$details['name']?></b></p>
                              <p>Email : <b><?=$details['email']?></b></p>
                              <p>Message : <b><?=$details['message']?></b></p>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
           
            <tr>
               <td height="5"></td>
            </tr>
            <!-- END SHOWCASE -->
            <!--ABOUT -->
            
            <!-- END FOOTER -->
         </tbody>
      </table>
   </body>
</html>