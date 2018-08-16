<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>


<style>


* {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
        
body {
    margin: 0;
    box-sizing: border-box;
    background: #ffff00
/*
    background-color: #fffef7
*/
}

.title {
    border-top: 1px solid black;
    padding: 8px 26px;
    cursor: pointer;
    color: black;    
    font-size: 25px;
   font-family: sans-serif;
    font-weight: 400;
    letter-spacing: 1px;
/*
    background-color: #fffef7
*/

}
    
    
span {
    text-transform: lowercase;
    letter-spacing: 0px;
    font-size: 14px;
    margin-top: 3px;
    vertical-align: center;
    /*color: white;*/
   
        }

    
    
.right {text-align: right;
        float: right}  
    
    
.title:hover {
            background:url('https://i.ytimg.com/vi/uk_il8n0x4o/maxresdefault.jpg') no-repeat center;
  background-attachment: fixed;
            background-size: cover
        }
     
/*    .project:hover {
        background:url('https://i.ytimg.com/vi/uk_il8n0x4o/maxresdefault.jpg') no-repeat center;
  background-attachment: fixed;
            background-size: cover
    }*/
    

.content {
    padding: 20px 20px 40px 20px;
    display: none;
/*
    border-bottom: 1px solid black;
*/
}

.content:hover {
        cursor: pointer
}
        

.contents {
            display: flex;
    justify-content: space-evenly;
    align-items: flex-start;
        }
        
p {
      width: 49%;
    -webkit-margin-before: 0em;
    -webkit-margin-after: 0em;
    -webkit-margin-start: 0px;
    -webkit-margin-end: 0px;
    margin-left: 1%;
    color: black;
    font-family: sans-serif;
    font-size: 25px;
    line-height: 30px;
    
        }

a {
        display: inline;
        text-decoration: none;
        color: black;


    } 

img {
   width: 35%;
   margin-right: 1%;
/*-webkit-box-shadow: 2px 3px 22px 0px rgba(194,194,194,0.82);
-moz-box-shadow: 2px 3px 22px 0px rgba(194,194,194,0.82);
box-shadow: 2px 3px 22px 0px rgba(194,194,194,0.82);*/

        }
   
        
        
@media only screen and (max-width : 830px) {
    
    
    .contents {
            display: block;
    
        }
    
    
    img {
        width: 100%
    }
    
    p {
          width: 100%;
        margin-top: 20px
    }
    
    }
    
    
@media only screen and (max-width : 720px) {
    
   
    .title {
        font-size: 20px    
    }
    
    
    p {
       font-size: 20px
    }
    
    }
    


</style>



<?php

$projects = page('projects')->children()->visible();

/*

The $limit parameter can be passed to this snippet to
display only a specified amount of projects:

```
<?php snippet('showcase', ['limit' => 3]) ?>
```

Learn more about snippets and parameters at:
https://getkirby.com/docs/templates/snippets

*/

if(isset($limit)) $projects = $projects->limit($limit);

?>


  <?php foreach($projects as $project): ?>

    <div class="project">
        <div class="title">
            <?= $project->title()->html() ?>
            <!--<span class="right"><?= $project->type()->html() ?></span>-->
        </div>
        <div class="content">
            <div class="contents">
                    <?php if($image = $project->images()->sortBy('sort', 'asc')->first()): $thumb = $image ?>
                    <img src="<?= $thumb->url() ?>" alt="Thumbnail for <?= $project->title()->html() ?>"/>
                  <?php endif ?>
                    <p><?= $project->text()->html() ?><br><br>
                         <a href="<?= $project->street()->html() ?>" target="blank"><?= $project->category()->html() ?></a>
                    </p>
            </div>
        </div>
    </div>
        
        
  <?php endforeach ?>


        
        
<script>
    $('.content, .title').click(function(){
        $(this).parents('.project').find('.content').slideToggle();
    });
</script>