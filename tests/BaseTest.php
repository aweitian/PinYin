<?php

use Aw\PinYin;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/8
 * Time: 10:44
 */
class BaseTest extends \PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        //测试10000个用时0.3S
        $this->assertEquals(
            "dui duo yin zi wu neng wei li",
            PinYin::convert('对多音字无能为力')
        );
        $this->assertEquals(
            "zui quan de PHPhan zi zhuan pin yin ku _bi bai du ci dian huan quan _dict_baidu_com_",
            PinYin::convert('最全的PHP汉字转拼音库，比百度词典还全（dict.baidu.com）')
        );
        $this->assertEquals(
            "shi shi _qiu tian kua wu yin si ye chou",
            PinYin::convert('试试：㐀㐁㐄㐅㐆㐌㐖㐜')
        );
        $this->assertEquals(
            "yi qi kai shi shu _12345",
            PinYin::convert('一起开始数：12345')
        );
        $this->assertEquals(
            "hai nan",
            PinYin::convert('海南')
        );
        $this->assertEquals(
            "wu lu mu qi",
            PinYin::convert('乌鲁木齐')
        );
        $this->assertEquals(
            "qian zong li zhu rong ji",
            PinYin::convert('前总理朱镕基')
        );
        $this->assertEquals(
            "j s z m",
            PinYin::convert('仅首字母', 'first')
        );
        $this->assertEquals(
            "zhan wei fu wei kong",
            PinYin::convert('占-位-符-为-空', 'all', ' ', '')
        );
        $this->assertEquals(
            "b y x z w y w d z f",
            PinYin::convert('不允许中文以外的字符', 'first', ' ', '', '')
        );
        $this->assertEquals(
            "z w y w d z f b h t h c",
            PinYin::convert('中文以外的字符被会替换成PLACEHOLDER abc-ade9i!!$#^%', 'first', ' ', '', '')
        );
        $this->assertEquals(
            "z w y w d z f b h t h c ##############",
            PinYin::convert('中文以外的字符被会替换成PLACEHOLDER///', 'first', ' ', '#', '')
        );
        $this->assertEquals(
            "zhanweifuweikong",
            PinYin::convert('占/位/符-为-空', 'all', '', '')
        );
        $this->assertEquals(
            "zwfwkabcedf",
            PinYin::convert('占/位/符-为-空abc edf', 'first', '', '')
        );
        //如果separator === ''则过滤英文的空格
        $this->assertEquals(
            "z*w*f*w*k*abc edf",
            PinYin::convert('占/位/符-为-空abc edf', 'first', '*', '')
        );
        $this->assertEquals(
            "z",
            PinYin::convert('占/位/符-为-空abc edf', 'one', '*', '')
        );
    }
}
