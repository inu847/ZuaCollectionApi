import scrapy
from scrapy.http import FormRequest
from scrapy.utils.response import open_in_browser


class LoginSpider(scrapy.Spider):
    name = 'login'
    allowed_domains = ['zuacollection.herokuapp.com']
    start_urls = (
        'http://zuacollection.herokuapp.com/login/',
    )

    def parse(self, response):
        token = response.xpath('//*[@name="_token"]/@value').extract_first()

        yield FormRequest('http://zuacollection.herokuapp.com/login',
                          formdata={'_token': token,
                                    'email': 'adin72978@gmail.com',
                                    'password': 'Semogaberkah'},
                            callback=self.parse_after_login)

    def parse_after_login(self, response):
        open_in_browser(response)
        # if response.xpath('//a[text()="Logout"]'):
        # self.log('You Logged In!')