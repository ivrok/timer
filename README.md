#Timer

2 ways to use.

1. Usefull for single file.
```
 $timer = new Timer();
 $timer->set('example point');
 $timer->getPrepared();//will get pretty style array
```
2. Usefull for check work of an all application.
```
//index.php
Timer::getInstant()->set('starting app');

//some file
Timer::getInstant()->set('some file');

//ending
Timer::getInstant()->set('ending');
Timer::getInstant()->getPrepared();
```
