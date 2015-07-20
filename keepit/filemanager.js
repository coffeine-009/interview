var File = function(id, type, name) {
    this.TYPE_DIR = 'dir';
    this.TYPE_FILE = 'file';

    this.type = type;
    this.name = name;
    this.id = id;
};

File.prototype.getName = function() {
    return this.name;
};

File.prototype.getType = function() {
    return this.type;
};

File.prototype.getId = function() {
    return this.id;
};


var FileManager = function() {
    this.RESOURCE = '';
    // Files
    this.files = [];
};

FileManager.prototype.fetch = function(file) {
    var request = new XMLHttpRequest();

    request.open('GET', this.RESOURCE, true);
};


window.onload = function() {
    alert(3);
};
