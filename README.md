# yii2-duoshuo
多说是一款追求极致体验的社会化评论框，可以用微博、QQ、人人、豆瓣等帐号登录并评论

> 安装 

   ```
   composer require dungang/yii2-duoshuo
   ```

> 使用

   - 如果需要同步评论数据，修改配置config/web.php。否则不需要添加
   
   ```
    modules=>[
        'duoshuo'=>[
            'class'=>'dungang\duoshuo\Module',
            'shortName'=>'',
            'secret'=>'',
            'sync'=>'class impl  Sync interface'
        ]
    ]
   ```
   
   - 使用widgets
   
   评论框
   
   ```
    dungang\duoshuo\widgets\Thread::widget([
        'id'=>'请将此处替换成文章在你的站点中的ID',
        'image'=>'文章图片地址，将用于转发时的附图',
        'title'=>'请替换成文章的标题',
        'url'=>'请替换成文章的网址',
        'authorId'=>'作者在本站中的id',
        'formPosition'=>'该页面中评论框的位置',
        'limit'=>'单页显示评论数',
        'order'=>'排序方式',
    ]);
   ```
   
   最新
   
   
   ```
    dungang\duoshuo\widgets\RecentComments::widget([
        'numItems'=>'5', //显示最新评论的条数，最大支持200条
        'showAvatars'=>'1', //是否显示头像，1：显示，0：不显示
        'showTime'=>'1', //是否显示时间，1：显示，0：不显示
        'showTitle'=>'1', //是否显示标题，1：显示，0：不显示
        'showAdmin'=>'1', //是否显示管理员的评论，1：显示，0：不显示
        'excerptLength'=>'70', //最大显示评论汉字数
    
    ]);
   ```
   
   最热
   
   
   ```
    dungang\duoshuo\widgets\TopThreads::widget([
        'numItems'=>'5', //显示最新文章的条数，默认值5
        'range'=>'daily', //获取的范围。daily：每日热评文章； weekly：每周热评文章； monthly：每月热评文章；all：总热评文章。
  
    ]);
   ```
   