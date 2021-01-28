// **********************************************************************************
// **                                                                              **
// ** zebratable.js                                 (c) Wolfram Plettscher 10/2016 **
// **                                                                              **
// **********************************************************************************
$(function(){
  $('.sqltable tr:first-child').addClass('sqltableone');
  $('.sqltable tr:nth-child(even)').addClass('sqltableeven');
  $('.sqltable tr:nth-child(2n+3)').addClass('sqltableodd');
  $('.sqltable2 tr:first-child').addClass('sqltableone');
});
