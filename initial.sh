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
