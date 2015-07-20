/**
 * File.
 * Describe file(File, dir)
 *
 * @param id    ID of file
 * @param type  Type of file(file, dir)
 * @param name  Name of file
 *
 * @constructor
 */
var File = function(id, type, name) {
    /// *** Constants   *** ///
    this.TYPE_DIR = 'dir';
    this.TYPE_FILE = 'file';

    /// *** Properties  *** ///
    this.id = id;
    this.name = name;
    this.type = type;
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


/**
 * File manager.
 * Encapsulation of work with files.
 *
 * @constructor
 */
var FileManager = function(resource, parent) {
    // ID of resouce
    this.RESOURCE = resource;
    // Files
    this.files = [];

    // Listen for rerender display
    var self = this;
    document.addEventListener('render', function() {
        FileManager.render(
            parent, 
            self.files
        );
    });

    // Listen for change dir
    window.onhashchange = function () {
        // Clean old files
        self.files = [];

        var id = window.location.hash.substr(1);
        self.fetch(new File(id, File.TYPE_DIR, '..'));
    };

    // Fetch first dir(root)
    self.fetch(new File('root', File.TYPE_DIR, '/'));
};

/**
 * Retrieve data from remote
 *
 * @param file  File
 */
FileManager.prototype.fetch = function(file) {
    var self = this;
    var request = new XMLHttpRequest();

    request.open('GET', this.RESOURCE + '/' + file.getId(), true);
    request.onreadystatechange = function() {
        if (request.readyState == 4) {
         if(request.status == 200) {
             self._purseResponse(request.responseXML);
             // Display new data
            document.dispatchEvent(new CustomEvent('render'));
         }
      }
    };
    request.send(null);
};

/**
 * Helper. Parse response.
 *
 * @param xml   XML object
 *
 * @private
 */
FileManager.prototype._purseResponse = function(xml) {
    
    var content = xml.getElementsByTagName('contents')[0].getElementsByTagName('folder');

    for (var i = 0; i < content.length; i++) {
        var id = content[i].getElementsByTagName('id')[0].childNodes[0].nodeValue;
        var name = content[i].getElementsByTagName('name')[0].childNodes[0].nodeValue;

        this.files.push(new File(id, File.TYPE_DIR, name));
    }
};

/**
 * Render view.
 * FIXME: use template system(like mustache)
 *
 * @param parent    Parent dom element
 * @static
 */
FileManager.render = function(parent, files) {
    var result = '<table><thead><tr><th>File Name</th></tr></thead><tbody>';
    for (var i = 0; i < files.length; i++) {
        result += '<tr><td><a href="#' 
            + files[i].getId() + '">' 
            + files[i].getName() 
        + '</a></td></tr>';
    }
    result += '</tbody></table>';
    parent.innerHTML = result;
};


/**
 * Entry point.
 * Enhancements:
 *  Load indicator
 */
window.onload = function() {
    try {
        new FileManager(
            'http://unthought.net/jobapi', 
            document.getElementById('filemanager')
        );
    } catch(e) {
        alert('Sorry. Your browser is not supported.');
    }
};
