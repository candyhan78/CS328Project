CREATE TABLE [dbo].[Order_Summary]
(
	[Order_num] INT NOT NULL PRIMARY KEY, 
    [Item_ID] INT NOT NULL, 
    [Date_Placed] DATE NOT NULL, 
    [Date_Complete] DATE NULL, 
    [Order_Qty] INT NOT NULL, 
    CONSTRAINT [FK_Order_Summary_Item] FOREIGN KEY (Item_ID) REFERENCES [Item]([Item_ID]) 
)
