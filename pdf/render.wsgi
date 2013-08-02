# coding: utf-8
import os
import sys
import json
import cgi
import datetime
import subprocess
import tempfile
import struct
from cgi import parse_qs, escape

# Мистика. Зачем перегружать sys, когда он был объявлен несколькими строчками выше?
reload(sys)
sys.setdefaultencoding('utf8')
sys.path.append(os.path.dirname(__file__))
from appy.pod.renderer import Renderer



def application(environ, start_response):
    def getPath (filename):
        return os.path.join(os.path.dirname(__file__), filename)

    def getTemplatePath ( filename ):
        return os.path.join(getPath('templates'), filename)


    dataJSON = dict()

    def _zeroFirst( number ):
        if ( number < 10 ):
            return '0'+str(number)
        return str(number)

    def getYear( path_string, data=dataJSON ):
        data = data if len(data) > 0 else dataJSON

        date_string = getData( path_string, data )
        date = datetime.datetime.fromtimestamp(int(date_string) / 1000)
        return date.year

    def _plural(number, one, two, many):
        if ( number > 10 and number < 20 ):
            return many

        if ( number == 1 or (number % 10) == 1 ):
            return one

        if ( (number % 10) > 1 and (number % 10) < 5 ):
            return two

        return many

    def getAge( path_string, data=dataJSON ):
        data = data if len(data) > 0 else dataJSON

        date_string = getData( path_string, data )

        today = datetime.datetime.now()
        birth_date = datetime.datetime.fromtimestamp(int(date_string) / 1000)

        delta = today - birth_date

        age = delta.days/365
        result = str(age) + _plural(age, ' год', ' года', ' лет')

        if ( age == 0 ):
            age = delta.days/12
            result = str(age) + _plural(age, ' месяц', ' месяца', ' месяцев')

            if ( age == 0 ):
                age = delta.days
                result = str(age) + _plural(age, ' день', ' дня', ' дней')

        return result

    def getSex( path_string, data=dataJSON ):
        data = data if len(data) > 0 else dataJSON

        sex_string = getData( path_string, data )

        if ( sex_string == 'male' ):
            return u'Мужской'
        elif ( sex_string == 'female' ):
            return u'Женский'
        else:
            return u'Неопределён'

    def getFullName( path_string, data=dataJSON ):
        data = data if len(data) > 0 else dataJSON

        name = getData( path_string, data )

        result_name = ''
        if (name.has_key('first') and name.has_key('last') and name.has_key('middle')):
            result_name += name['last']
            result_name += ' ' + name['first']
            result_name += (' ' + name['middle']) if len(name['middle']) > 0 else ''
        else:
            result_name = name['raw'] if len(name['raw']) > 0 else ''

        return result_name

    def getShotName(path_string, data=dataJSON):
        data = data if len(data) > 0 else dataJSON

        name = getData( path_string, data )
        
        result_name = ''
        if (name.has_key('first') and name.has_key('last') and name.has_key('middle')):
            result_name += name['last']
            result_name += ' ' + name['first'][0] + '.'
            result_name += (' ' + name['middle'][0] + '.') if len(name['middle']) > 0 else ''
        else:
            result_name = name['raw'] if len(name['raw']) > 0 else ''

        return result_name


    def getAddress( path_string, data=dataJSON ):
        data = data if len(data) > 0 else dataJSON

        address = getData(path_string, data)

        fullAddress = ''


        if address.has_key('district') and address['district'] != None and isinstance(address['district'], dict):
            if address['district'].has_key('name') and len(str(address['district']['name'])) > 0:
                if address['district'].has_key("socr") and len(str(address['district']['socr'])) > 0:
                    fullAddress += address['district']['name'] + " " + address['district']['socr'] + '., '
                else:
                    fullAddress += address['district']['name'] + ', '

        if address.has_key('republic') and address['republic'] != None and isinstance(address['republic'], dict):
            if address['republic'].has_key('name') and len(str(address['republic']['name'])) > 0:
                if address['republic'].has_key("socr") and len(str(address['republic']['socr'])) > 0:
                    fullAddress += address['republic']['name'] + " " + address['republic']['socr'] + '., '
                else:
                    fullAddress += address['republic']['name'] + ', '

        if address.has_key('locality') and address['locality'] != None and isinstance(address['locality'], dict):
            if address['locality'].has_key('name') and len(str(address['locality']['name'])) > 0:
                if address['locality'].has_key("socr") and len(str(address['locality']['socr'])) > 0:
                    fullAddress += address['locality']['name'] + " " + address['locality']['socr'] + '., '
                else:
                    fullAddress += address['locality']['name'] + ', '


        if address.has_key('city') and address['city'] != None and isinstance(address['city'], dict):
            if address['city'].has_key('name') and len(str(address['city']['name'])) > 0:
                if address['city'].has_key("socr") and len(str(address['city']['socr'])) > 0:
                    fullAddress += address['city']['socr'] + ". " + address['city']['name'] + ', '
                else:
                    fullAddress += address['city']['name'] + ', '


        if address.has_key('street') and address['street'] != None and isinstance(address['street'], dict):
            if address['street'].has_key('name') and len(str(address['street']['name'])) > 0:
                if address['street'].has_key("socr") and len(str(address['street']['socr'])) > 0:
                    fullAddress += address['street']['socr'] + ". " + address['street']['name'] + ', '
                else:
                    fullAddress += address['street']['name'] + ', '


        if address.has_key('house') and address['house'] != None and len(str(address['house'])) > 0:
            fullAddress += "дом "+address['house'] + ', '

        if address.has_key('building') and address['building'] != None and len(str(address['building'])) > 0:
            fullAddress += "корпус "+ address['building'] + ', '

        if address.has_key('flat') and address['flat'] != None and len(str(address['flat'])) > 0:
            fullAddress += "кв. "+address['flat'] + ', '


        if len(fullAddress) > 0:
            fullAddress = fullAddress[:-2]

            return fullAddress

        if ( address.has_key('fullAddress') and len(address['fullAddress']) > 0 ):
            return address['fullAddress']

        return ''

    def _getOccupationString( occupation ):
        result = ""

        works_string = ""

        for work in occupation['works']:
            if occupation['socialStatus']['id'] == 310 and work['workingPlace']:
                result += work['position']+ " в «"+ work['workingPlace'] + "»; "
                continue

            if occupation['socialStatus']['id'] == 313 and work['preschoolNumber']:
                result += "Номер детсада, ясли: "+ work['preschoolNumber'] + "; "
                continue

            if occupation['socialStatus']['id'] == 314 and work['schoolNumber'] and len(str(work['schoolNumber'])) > 0:
                result += "Номер школы: "+ work['schoolNumber'] + ", класс " + work['classNumber']+ "; "
                continue

            if occupation['socialStatus']['id'] == 315:
                if work['forceBranch'] and isinstance(work['forceBranch'], dict) and work['forceBranch'].has_key('id'):
                    result += "Род войск:" + work['forceBranch']['id'] + "; "

                if work['militaryUnit']:
                    result += "Войсковая часть:" + work['militaryUnit'] + "; "

                if work['rank'] and isinstance(work['rank'], dict) and work['rank']['id']:
                    result += "Звание:" + work['rank']['id'] + "; "

                continue

        if len(result) > 0:
            result = result[:-2]

        return result



    def simpleIf( path_string, result_if_true, result_if_false, data=dataJSON ):
        data = data if len(data) > 0 else dataJSON
        statement = getData(path_string, data)

        if ( statement ):
            return result_if_true
        return result_if_false

    def conditionIf(path_string, condition, result_if_true, result_if_false, data=dataJSON ):
        data = data if len(data) > 0 else dataJSON
        statement = getData(path_string, data)

        if statement == condition: return result_if_true

        return result_if_false


    def formatDate( path_string, data=dataJSON ):
        data = data if len(data) > 0 else dataJSON
        date_string = getData(path_string, data)

        if not len(str(date_string)) > 0:
            return ''

        birth_date = datetime.datetime.fromtimestamp( int(date_string) / 1000 )

        return _zeroFirst(birth_date.day) + '.' + _zeroFirst(birth_date.month) + '.' + str(birth_date.year)

    def formatDateTime( path_string, data=dataJSON ):
        data = data if len(data) > 0 else dataJSON
        date_string = getData(path_string, data)

        if not len(str(date_string)) > 0:
            return ''

        birth_date = datetime.datetime.fromtimestamp( int(date_string) / 1000 )

        return _zeroFirst(birth_date.day) + '.' + _zeroFirst(birth_date.month) + '.' + str(birth_date.year) + " " + _zeroFirst(birth_date.hour)+ ":" + _zeroFirst(birth_date.minute)

    def test (value):
        #2

        return str(sys.path)

    def getDaysDelta (first_date_path, second_date_path, data=dataJSON):
        data = data if len(data) > 0 else dataJSON


        first_date_string = getData(first_date_path, data)
        second_date_string = getData(second_date_path, data)

        # Наличие начальной даты — обязательно
        if not len(str(first_date_string)) > 0:
            return ''

        first_date = datetime.datetime.fromtimestamp( int(first_date_string) / 1000 )

        if len(str(second_date_string)) > 0:
            second_date = datetime.datetime.fromtimestamp( int(second_date_string) / 1000 )
        else:
            second_date = datetime.datetime.now()

        delta = second_date - first_date

        return str(delta.days)
    
    def findDiagnosis( path_string, diagnosis, data=dataJSON ):
        data = data if len(data) > 0 else dataJSON

        diagnoses_array = getData(path_string, data)

        result = {}
        for diagnoses_element in diagnoses_array:
            if diagnoses_element['diagnosisKind'] == diagnosis:
                result = diagnoses_element

                break

        return result


    def getBarcode39( path_string, data=dataJSON ):
        data = data if len(data) > 0 else dataJSON
        code = getData( path_string, data )

        if not len(str(code)) > 0:
            return ''

        bar_code = ''
        bar_code += '*' + str(code) + '*'

        return bar_code

    def getBarcode128(path_string, data=dataJSON):
        data = data if len(data) > 0 else dataJSON
        barcode = getData( path_string, data )

        if not len(str(barcode)) > 0:
            return ''

        b_struct = struct.Struct(">BBBBBB")
        if not (100000 <= barcode <= 999999):
        # Этого не должно случиться.
            return ''
        
        # Стартовый и стоповый символы в нашей таблице символов имеют иные коды (+64)
        start = 0xcd
        stop = 0xce
        c, c3 = divmod(barcode, 100)
        c, c2 = divmod(c, 100)
        c, c1 = divmod(c, 100)
        cs = reduce(lambda x, (y, c): (x + y*c) % 103, [(c1, 1), (c2, 2), (c3, 3)], 2)
        
        # Транслируем коды символов
        c1, c2, c3, cs = tuple(map(lambda w: w + 100 if w > 94 else w + 32, (c1, c2, c3, cs)))
        barcode_char = b_struct.pack(start, c1, c2, c3, cs, stop)
       
        return barcode_char.decode('windows-1252')


    def getFinanceCode (financeCode):
        if financeCode == 2:
            return '1'
        elif financeCode == 1:
            return '2'
        elif financeCode == 3:
            return '3'
        elif financeCode == 4:
            return '3'
        elif financeCode == 5:
            return '7'
        elif financeCode == 7:
            return '5'
        elif financeCode == 9:
            return '6'
        else:
            return ''      


    def getData( path_string, data=dataJSON ):
        data = data if len(data) > 0 else dataJSON
        path = path_string.split('.')
        
        current_object = data
        returning_data = ''

        for path_part in path:
            try:
                part = current_object[path_part]
            except KeyError:
                part = None

            if ( part != None ):
                current_object = part
                returning_data = current_object
            else:
                returning_data = ''
                break

        return returning_data



    status = '200 OK'

    post_env = environ.copy()
    post_env['QUERY_STRING'] = ''
    post = cgi.FieldStorage(
        fp=environ['wsgi.input'],
        environ=post_env,
        keep_blank_values=True
    )



    jsonDecoder = json.JSONDecoder('utf8')

    dataJSON = jsonDecoder.decode(post.getvalue('data'))


    rendered_file_name = tempfile.NamedTemporaryFile(suffix='.odt').name

    renderer = Renderer(getTemplatePath(post.getvalue('template')+'.odt'), dict(data=dataJSON,
        _getYear=getYear,
        _plural = _plural,
        _getOccupationString = _getOccupationString,
        simpleIf = simpleIf,
        conditionIf = conditionIf,
        getAge = getAge,
        formatDate = formatDate,
        formatDateTime = formatDateTime,
        getFullName = getFullName,
        getShotName = getShotName,
        getSex = getSex,
        getData = getData,
        getBarcode39 = getBarcode39,
        getBarcode128 = getBarcode128,
        findDiagnosis = findDiagnosis,
        getAddress = getAddress,
        getFinanceCode = getFinanceCode,
        getDaysDelta=getDaysDelta), rendered_file_name)

    renderer.run()

    
    # soffice --invisible --headless --nofirststartwizard '-accept=socket,host=localhost,port=2002;urp;'
    # retcode = subprocess.call(['soffice', '--invisible', '--headless', '--nofirststartwizard', '--accept=socket,host=localhost,port=2002;urp;'])
    

    pdf_file_name = rendered_file_name.replace('.odt', '.pdf')

    #converter = DocumentConverter()
    #converter.convert(rendered_file_name, pdf_file_name)


    subprocess.call(['unoconv', '-f', 'pdf', rendered_file_name])

    pdf = open(pdf_file_name, 'r')
    output = pdf.read()
    pdf.close()

    #if os.path.exists(pdf_file_name):
    #    os.remove(pdf_file_name)

    response_headers = [('Content-type', 'application/pdf; charset=utf-8'),
                        ('Content-Length', str(len(output)))]
    start_response(status, response_headers)

    return [output]