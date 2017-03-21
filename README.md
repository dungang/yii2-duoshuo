# yii2-duoshuo
多说是一款追求极致体验的社会化评论框，可以用微博、QQ、人人、豆瓣等帐号登录并评论

> 安装 

   ```
   composer require dungang/yii2-duoshuo
   ```

> 使用

   - 如果需要反向同步评论数据，修改配置config/web.php。否则不需要添加
   
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
   反向同步的地址 http://domain/path/index.php?r=duoshuo/sync
   
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
   
   
   > 协议
   
   MIT License
   
   Copyright (c) 2017 dungang
   
   Permission is hereby granted, free of charge, to any person obtaining a copy
   of this software and associated documentation files (the "Software"), to deal
   in the Software without restriction, including without limitation the rights
   to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
   copies of the Software, and to permit persons to whom the Software is
   furnished to do so, subject to the following conditions:
   
   The above copyright notice and this permission notice shall be included in all
   copies or substantial portions of the Software.
   
   THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
   IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
   AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
   LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
   OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
   SOFTWARE.