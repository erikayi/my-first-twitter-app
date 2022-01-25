//  called inside the getData function 
    //  after we populate the tableData 

    var row_index = 0;
    var size = 5000;
    while (row_index < tableData.length){
         table.appendRows(tableData.slice(row_index, size + row_index));
         row_index += size;
         tableau.reportProgress("Getting row: " + row_index);
     }