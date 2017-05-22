Redis从入门到删库跑路
1、安装篇:
	linux/unix:
		> wget http://download.redis.io/releases/redis-3.2.8.tar.gz
		> tar xzf redis-3.2.8.tar.gz
		> cd redis-3.2.8
		> make
	修改配置文件Redis：bind IP地址
	启动服务：src/redis-server 默认该窗口不可关闭
	使用客户端：src/redis-cli	

	window
		Redis原生不支持windows，但是微软开源小组维护了一个：
		https://github.com/MSOpenTech/redis/archive/3.0.zip 或者 https://github.com/MSOpenTech/redis.git
		直接安装即可
		进入Redis安装目录,修改配置文件 redis.windows.conf 并 bind IP地址
		启动服务：> redis-server redis.windows.conf 默认窗口不可关闭
		启动客户端：> redis-cli
2、数据类型篇
	1) 字符串：
		set key value 保存一个字符串
			> set name "pawn"
			> ok
		get key 获取字符串的值
			> get name
			> "pawn"
		
		一个键最大能存储512M

	2）Hash类型：
		hmset key object 保存一个对象信息
			> hmset user:1 username faker age 18 rank 1000 grade master
			> ok
		hgetall key 获取一个对象的信息
			> hgetall user:1
			  1) "username"
			  2) "faker"
			  3) "age"
			  4) "18"
			  5) "rank"
			  6) "1000"
			  7) "grade"
			  8) "master"

		可以存储2^32-1个键值对

	3）List类型：
		lpush key value 将一个值放入列表的左边
			> lpush website www.fishc.com
			> lpush website bbs.fishc.com
			> lpush website blog.fishc.com
		rpush key value 将一个值放入列表的右边
			> rpush website www.baidu.com
			> rpush website bbs.baidu.com
		lrange key start end 获取列表指定范围的值,如果下标为负数,则-1表示最后一个元素,以此类推
			> lrange website 0 10
			 1) blog.fishc.com
		 	 2) bbs.fishc.com
			 3) www.fishc.com
			 4) www.baidu.com
			 5) bbs.baidu.com
			> lrange website 0 -1
			 1) blog.fishc.com
			 2) bbs.fishc.com
			 3) www.fishc.com
			 4) www.baidu.com
			 5) bbs.baidu.com
	4）Set集合类型：
		sadd
