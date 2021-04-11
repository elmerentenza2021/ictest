


function MyViewModel(initData) {
    self = this;
    self.items = ko.observableArray(initData);
    self.itemsToShow = ko.observableArray([]);

    self.perPage = ko.observable(5);

    self.currentPage = ko.observable(1);
    self.totalPages = ko.observable(0);

    self.iniciated = false;

    self.refresh = function (){
        var from = (self.currentPage()-1)*self.perPage();
        var to = from + self.perPage(); 
        self.itemsToShow(self.items.slice(from, to));
    }

    self.sortByName = function (){
        self.items(self.items.sort(
            function(a,b){
                return a.name == b.name ? 0 : (a.name < b.name ? -1 : 1) 
            }
        ).slice(0));
        self.refresh();
    }

    self.sortByType = function (){
        self.items(self.items.sort(
            function(a,b){
                return a.type == b.type ? 0 : (a.type < b.type ? -1 : 1) 
            }
        ).slice(0));
        self.refresh();
    }

    self.sortByPhone = function (){
        self.items(self.items.sort(
            function(a,b){
                return a.phone == b.phone ? 0 : (a.phone < b.phone ? -1 : 1) 
            }
        ).slice(0));
        self.refresh();
    }

    self.sortByBirth = function (){
        self.items(self.items.sort(
            function(a,b){
                return a.birth == b.birth ? 0 : (a.birth < b.birth ? -1 : 1) 
            }
        ).slice(0));
        self.refresh();
    }

    // next
    self.next = function () {
        if (self.currentPage() < self.totalPages()){
            self.currentPage(self.currentPage() + 1); 
            self.refresh();
        }
    };

    // back
    self.back = function () {
        if (self.currentPage() != 1) {
            self.currentPage(self.currentPage() - 1);
            self.refresh();
        }
    };

    self.init = function(){
        if (!self.iniciated){
            self.totalPages(Math.ceil(self.items().length / self.perPage()));
            self.itemsToShow(self.items.slice(0, self.perPage()));
            iniciated = false;
        }
        
        $('#listado').toggle();
        
    };

    self.test = function(){
        
    }
}
