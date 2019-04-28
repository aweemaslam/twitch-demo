<html>
   <head></head>
   <body>
      <!--can be done using  new Twitch.Embed(selector,callback)-->
      <iframe
         src="https://player.twitch.tv/?channel=<?=$_POST['name']?>&muted=true"
         height="450"
         width="450"
         frameborder="0"
         scrolling="no"
         allowfullscreen="true">
      </iframe>
      <iframe frameborder="0"
         scrolling="no"
         id="chat_embed"
         src="https://www.twitch.tv/embed/<?=$_POST['name']?>/chat"
         height="450"
         width="350">
      </iframe>
      <div id="twitch-embed"></div>
   </body>
</html>