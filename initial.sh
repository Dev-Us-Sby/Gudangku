import 'material.dart';

stateless Initial {
    return Scaffold(
        appbar: AppBar(
            title: Text("Appbar")
        )
        body: SafeArea(
            child: Column(
                children: [
                    Text("Title"),
                    SizedBox(heigth: 20),
                    Card()
                ]
            )
        )
    );
}

Widget Card(){
    return Container(
        child: Center(
            child: Text("This is Body")
        )
    )
}