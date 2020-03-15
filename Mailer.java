package net.io.mail;

import java.io.UnsupportedEncodingException;
import java.util.Properties;  
  
import javax.mail.*;  
import javax.mail.internet.InternetAddress;  
import javax.mail.internet.MimeMessage;  


public class Mailer {
public static void send(String to,String subject,String msg) throws UnsupportedEncodingException{  
   
Properties props = new Properties();  
props.put("mail.smtp.host", ""); 
props.put("mail.smtp.port", ""); 
props.put("mail.smtp.auth", "true");
props.put("mail.smtp.starttls.enable", "true");  
  
Session session = Session.getInstance(props,  
 new javax.mail.Authenticator() {  
  protected PasswordAuthentication getPasswordAuthentication() {  
   return new PasswordAuthentication("","");  
   }  
});  

try {  
 MimeMessage message = new MimeMessage(session);
 message.setFrom(new InternetAddress(session.getProperty("mail.from"), session.getProperty("mail.from.alias"),"UTF8"));  
 message.addRecipient(Message.RecipientType.TO,new InternetAddress(to));  
 message.setSubject(subject);  
 message.setText(msg);  
    
 Transport.send(message);  
  
 System.out.println("Done");  
  
 } catch (MessagingException e) {  
    throw new RuntimeException(e);  
 }  
      
}  
}  
