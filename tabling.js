class aaa
{
    static t = 0;
    static chart;
}

function setupTable(tableId, selectId, fields, creatorCallback)
{
    var htmlTBody   = document.getElementById(tableId),
        rowTpl      = document.createElement("TR"),
        rowNum      = 0,
        ELEMENT, TD;
 
    /* Строим шаблон строки таблицы один раз, в дальнейшем будем просто его клонировать */
	for(var field in fields) 
	{
        if (false === fields.hasOwnProperty(field)) { continue; }
        TD = document.createElement("TD");
 
		
        if (creatorCallback) {
            ELEMENT = creatorCallback(rowNum, fields[field])
        } else {
            ELEMENT = document.createElement("INPUT");
            ELEMENT.name = fields[field] + "[]";
        }
        if (ELEMENT.type == 'text')
        {
            ELEMENT.value = "Аноним";
        }
        else
        {
            ELEMENT.value = rowNum;
        }
        TD.appendChild(ELEMENT);
        rowTpl.appendChild(TD);
 
        rowNum++;
    }
	while(htmlTBody.firstChild) {
            htmlTBody.removeChild(htmlTBody.firstChild);
        }
        for (var i = 0; i < 4; i++) {
            htmlTBody.appendChild(rowTpl.cloneNode(true));
        }

}