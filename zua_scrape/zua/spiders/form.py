import scrapy
# from scrapy.http import Request

def product_info(response, value):
    return response.xpath('//table/tbody/tr/following-sibling::td/text()').extract_first()

class FormSpider(scrapy.Spider):
    name = 'form'
    allowed_domains = ['zuacollection.herokuapp.com']
    start_urls = ['http://zuacollection.herokuapp.com/scrapingformforme']

    def parse(self, response):
        success = response.xpath('//tbody/tr')
        for succes in success:
            nama = succes.xpath('.//td/text()').extract_first()

            kategori = succes.xpath('//td/text()').extract()
            category = kategori[1]

            invoice = succes.xpath('//td/text()').extract()
            invoices = invoice[2]

            succes_at = succes.xpath('//td/text()').extract()
            succes = succes_at[3]


            yield{'Nama': nama,
                  'Kategori': category,
                  'Invoice': invoices,
                  'Success at': succes}

            # next_page_url = response.xpath('//a[text()="Next »"]/@href').extract_first()
            # if next_page_url:
            #     yield scrapy.Request(response.urljoin(next_page_url), callback=self.parse)


